<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use GuzzleHttp\Client;

class LoginController extends Controller
{
    // use AuthenticatesUsers;

    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        // Get client's IP address
        $ipAddress = $request->ip();

        // Get the abuse confidence score
        $abuseConfidenceScore = $this->checkAbuseIPDB($ipAddress);

        // Check if the API was unreachable or if the IP was flagged
        if ($abuseConfidenceScore === null) {
            throw ValidationException::withMessages([
                $this->username() => 'AbuseIPDB API is currently unreachable. Please try again later.',
            ]);
        } elseif ($abuseConfidenceScore >= 70) {
            throw ValidationException::withMessages([
                $this->username() => 'Your IP address has been flagged. Please contact our team if you believe this is a mistake.',
            ]);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ]);
    }

    private function checkAbuseIPDB(string $ipAddress)
    {
        // Use the injected Guzzle HTTP client
        $client = $this->client;

        // Try to send a request to the AbuseIPDB API
        try {
            $response = $client->request('GET', 'https://api.abuseipdb.com/api/v2/check', [
                'query' => [
                    'ipAddress' => $ipAddress,
                    'maxAgeInDays' => 90,
                ],
                'headers' => [
                    'Key' => env('ABUSEIPDB_KEY'),
                    'Accept' => 'application/json',
                ],
            ]);

            // Parse the response
            $data = json_decode($response->getBody()->getContents());

            // Return the abuse confidence score
            return $data->data->abuseConfidenceScore;
        } catch (\Exception $e) {
            // If the API request fails, return null
            return null;
        }
    }
}

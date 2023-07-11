<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function create(): View
    {
        // Display the view for user registration
        return view('auth.register');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
    }

    public function createUser(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'username'=> $data['email'],
        ]);
    }

    public function register(Request $request)
    {
        // Create a validator instance
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                // Check if the email is unique in the `users` table
                Rule::unique('users', 'email'),
            ],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'ip' => 'required|ip',
        ]);
    
        // Get client's IP address
        $ipAddress = $request->ip();
    
        // Get the abuse confidence score
        $abuseConfidenceScore = $this->checkAbuseIPDB($ipAddress);
    
        // Check if the API was unreachable or if the IP was flagged
        if ($abuseConfidenceScore === null) {
            $validator->errors()->add('ip', 'AbuseIPDB API is currently unreachable. Please try again later.');
        } elseif ($abuseConfidenceScore >= 70) {
            $validator->errors()->add('ip', 'Your IP address has been flagged. Please contact our team if you believe this is a mistake.');
        }
    
        // If the validation fails, throw an exception
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    
        // If validation passes, proceed with the registration
        $user = $this->createUser($request->all());
        
        event(new Registered($user));
        
        $user->sendEmailVerificationNotification();
        
        Auth::login($user);
        
        // Redirect the user to the intended page
        return redirect(RouteServiceProvider::HOME);
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
    
            // Log the response data
            Log::info('AbuseIPDB response: ', (array) $data);
    
            // Return the abuse confidence score
            return $data->data->abuseConfidenceScore;
        } catch (\Exception $e) {
            // Log the exception
            Log::error('AbuseIPDB request failed: ', ['message' => $e->getMessage()]);
    
            // If the API request fails, return null
            return null;
        }
    }
}

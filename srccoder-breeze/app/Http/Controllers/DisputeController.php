<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use GuzzleHttp\Client;

class DisputeController extends Controller
{
    public function create()
    {
        return view('dispute.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'message' => 'required',
        ]);

        // Send email
        Mail::raw($request->message, function ($message) use ($request) {
            $message->to('support@srccoder.com');
            $message->from($request->email);
            $message->subject('IP Flag Dispute');
        });

        // Create a Guzzle HTTP client
        $client = new Client();

        // Send a request to the AbuseIPDB API to report the IP
        $response = $client->request('POST', 'https://api.abuseipdb.com/api/v2/report', [
            'form_params' => [
                'ip' => $request->ip(),
                'categories' => '15,18', // The type of abuse you're reporting
                'comment' => 'This IP has been flagged by our system.'
            ],
            'headers' => [
                'Key' => env('ABUSEIPDB_KEY'),
                'Accept' => 'application/json',
            ],
        ]);

        // Log the event
        // ...

        return redirect()->route('register')->with('message', 'Your dispute has been submitted and will be reviewed shortly.');
    }
}

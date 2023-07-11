<?php

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Validation\ValidationException;
use Tests\TestCase;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;

class RegisterAbuseIPDBTest extends TestCase
{
    use RefreshDatabase;

    public function test_example(): void
    {
        //test the tester
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_new_users_can_register()
{
    $response = $this->post(route('register'), [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
        'ip' => '127.0.0.1',  // add this line
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect(RouteServiceProvider::HOME);
}

public function test_registration_with_non_abusive_ip()
{
    // Mock the Guzzle Client in your App container
    $mock = new MockHandler([
        new Response(200, [], json_encode([
            'data' => [
                'abuseConfidenceScore' => 10,
            ],
        ]))
    ]);

    $handlerStack = HandlerStack::create($mock);
    $client = new Client(['handler' => $handlerStack]);
    $this->app->instance(Client::class, $client);

    // Make a POST request to your register route
    $response = $this->post(route('register'), [
        'name' => 'Test User',
        'email' => 'testuser@example.com',
        'password' => 'password',
        'password_confirmation' => 'password',
        'ip' => '127.0.0.1',  // add this line
    ]);

    // Assert the user was created successfully
    $response->assertRedirect(RouteServiceProvider::HOME);
    $this->assertDatabaseHas('users', ['email' => 'testuser@example.com']);
}

    public function test_registration_with_abusive_ip()
    {
        // Mock the Guzzle Client in your App container
        $mock = new MockHandler([
            new Response(200, [], json_encode([
                'data' => [
                    'abuseConfidenceScore' => 80,
                ],
            ]))
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);
        $this->app->instance(Client::class, $client);

        // Make a POST request to your register route
        $response = $this->post(route('register'), [
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        // Assert the user was not created and the error message was returned
        $response->assertSessionHasErrors('ip');
        $this->assertDatabaseMissing('users', ['email' => 'testuser@example.com']);
    }

    public function test_registration_when_abuse_ipdb_api_unreachable()
    {
        // Mock the Guzzle Client in your App container
        $mock = new MockHandler([
            new Response(500)
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);
        $this->app->instance(Client::class, $client);

        // Make a POST request to your register route
        $response = $this->post(route('register'), [
            'name' => 'Test User',
            'email' => 'testuser@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        // Assert the user was not created and the error message was returned
        $response->assertSessionHasErrors('ip');
        $this->assertDatabaseMissing('users', ['email' => 'testuser@example.com']);
    }
}
    
    //Like user keeps witching ip
    // public function test_registration_with_abusive_ip_repeated_check()
    // {
    //     $abusiveIps = [
    //         '192.0.2.1',
    //         '58.59.69.22',
    //         '39.184.226.31',
    //         '121.130.57.196',
    //         '117.102.82.13',
    //         '43.140.199.251',
    //         '46.99.158.235',
    //         '183.214.98.138',
    //         '193.32.162.158',
    //         '176.213.141.182',
    //         '159.223.158.198',
    //         '113.252.146.204',
    //         '36.95.1.101',
    //         '188.166.39.184',
    //         '184.168.113.205',
    //         '122.176.119.28',
    //         '161.35.227.188',
    //         '118.194.253.74',        
    //         '185.160.229.50',
    //         '147.182.132.199',
    //         '59.144.248.124',
    //         '185.38.142.171',
    //         '120.253.26.219',
    //         '220.71.151.30',
    //         '139.59.121.198',
    //         '112.169.180.240',
    //         '80.107.50.128',
    //         '64.22.158.131',
    //         '192.241.195.28',
    //         '192.241.192.27',
    //         '170.64.178.116',
    //         '104.236.128.7',
    //         '61.81.143.68',
    //         '191.36.153.200',
    //         '184.69.169.70',
    //         '163.53.206.147',
    //         '118.35.125.107',
    //         '35.203.211.42',
    //         '185.254.37.246',
    //         '34.65.234.0',
    //         '58.246.77.82',
    //         '8.219.53.181',
    //         '162.216.150.29',
    //         '47.243.36.74',
    //         '43.252.145.2',
    //         '222.99.68.149',
    //         '146.185.159.124',
    //         '139.255.52.75',
    //         '111.39.212.11',
    //         '143.42.194.250',
    //         '78.11.37.220',
    //         '39.106.81.183',
    //         '24.109.97.50',
    //         '46.101.230.11',
    //         '195.19.97.157',
    //         '192.241.222.35',
    //         '222.138.24.44',
    //         '140.99.191.218',
    //         '124.89.60.158',
    //         ];

    //     foreach ($abusiveIps as $ip) {
    //         // Mock the Guzzle Client in your App container
    //         $mock = new MockHandler([
    //             new Response(200, [], json_encode([
    //                 'data' => [
    //                     'abuseConfidenceScore' => 80,
    //                 ],
    //             ]))
    //         ]);

    //         $handlerStack = HandlerStack::create($mock);
    //         $client = new Client(['handler' => $handlerStack]);
    //         $this->app->instance(Client::class, $client);

        
    //     // Make a POST request to your register route
    //         $response = $this->post(route('register', [
    //             'name' => 'Test User',
    //             'email' => 'scrccodertest@example.com',  // the email to use
    //             'password' => 'password',
    //             'password_confirmation' => 'password',
    //         ]), [], ['REMOTE_ADDR' => $ip]);

    //         // Assert the user was not created and the error message was returned
    //         $response->assertSessionHasErrors('ip');
    //         $this->assertDatabaseMissing('users', ['email' => 'scrccodertest@example.com']);  // check this email

    //     }
    // }


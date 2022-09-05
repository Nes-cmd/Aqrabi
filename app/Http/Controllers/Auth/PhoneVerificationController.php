<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Twilio\Rest\Client; 
use Illuminate\Http\Request;

class PhoneVerificationController extends Controller
{
    public function verifyPhone()
    {
        return view('auth.verify');
    }
    public function sendVerification()
    {
        $code = rand(1000,9999);
        session()->put('short_code', $code);
        $this->sendMessage('This is your Arabi phone verification code '.$code, '+251940678725');
        return view('auth.confirm-phone');

    }
    private function sendMessage($message, $recipients)
    {
        $account_sid = env("TWILIO_SID");
        $auth_token = env("TWILIO_AUTH");
        $twilio_number = env("TWILIO_NUMBER");
        $client = new Client($account_sid, $auth_token);
        $response = $client->messages->create(
            $recipients,
            ['from' => $twilio_number, 'body' => $message]
        );
        return $response;
    }
}

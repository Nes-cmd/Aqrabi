<?php

namespace App\Helper;
use Twilio\Rest\Client; 

class TwilioSMS{
    public function sendMessage($message, $recipients)
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
    public function sendVerificationCode($phone)
    {
        $code = rand(1000, 9999);
        session()->put('short_code', $code);
        return $this->sendMessage('This is your Arabi phone verification code '.$code, $phone);
    }
}
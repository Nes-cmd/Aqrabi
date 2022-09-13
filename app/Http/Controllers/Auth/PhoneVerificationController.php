<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Helper\TwilioSMS;

class PhoneVerificationController extends Controller
{
    public function verifyPhone()
    {
        return view('auth.verify');
    }
    public function sendVerification()
    {
        $user = auth()->user();
        $phone = phoneMerge($user->dial_code, $user->phone);
        $twilio = new TwilioSMS();
        $twilio->sendVerificationCode($phone);
        return view('auth.confirm-phone');
    }
    public function resend()
    {
        $user = auth()->user();
        $phone = phoneMerge($user->dial_code, $user->phone);
        $twilio = new TwilioSMS();
        $twilio->sendVerificationCode($phone);
        return back();
    }
    public function checkVerification(Request $request)
    {
        $request->validate([
            'confirmation_code' => 'required|numeric|digits:4',
        ]);
        if ($request->confirmation_code == session()->get('short_code')) {
            $user = User::find(auth()->id());
            $user->phone_verified_at = now()->toDateTimeString();
            $user->save();
            session()->forget('short_code');
            session()->save();
            return redirect('/');
        }
        return back()->with('error', 'The code you entered is not correct');
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\TwilioSMS;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PasswordResetController extends Controller
{
    public function resetView()
    {
        return view('auth.passwords.reset');
    }
    public function phoneConfirmation(Request $request)
    {

        $request->validate([
            'country_code' => 'required',
            'phone' => 'required|max:10|min:9'
        ]);
        if (strlen($request->phone) == 9) {
            $phone = $request->country_code . $request->phone;
        } else {
            $phone = $request->country_code . substr($request->phone, 1);
        }

        $user = User::where('phone', $phone)->first();
        if ($user) {
            $code = rand(1000, 9999);
            // PasswordReset::create([
            //     'phone' => $phone,
            //     'code' => $code
            // ]);
            $requester = ['phone' => $phone, 'code' => $code, 'confirmed' => false];
            session()->put('password_reset_requester', $requester);
            $twilio = new TwilioSMS();
            $twilio->sendMessage('This is your Arabi phone verification code ' . $code, $phone);
            return redirect('confirm-phone');
        } else {
            return back();
        }
    }
    public function codeResend()
    {
        $requester = session()->get('password_reset_requester');
        $code = rand(1000, 9999);
        $requester['code'] = $code;
        session()->put('password_reset_requester', $requester);
        $twilio = new TwilioSMS();
        $twilio->sendMessage('This is your Arabi phone verification code ' . $code, $requester['phone']);
        return redirect('confirm-phone');
    }
    public function confirmPhoneView()
    {
        $phone = session()->get('password_reset_requester')['phone'];
        return view('auth.passwords.confirm-phone', compact('phone'));
    }
    public function codeConfirmation(Request $request)
    {
        $request->validate([
            'confirmation_code' => 'required|numeric|digits:4',
        ]);
        if ($request->confirmation_code == session()->get('password_reset_requester')['code']) {
            $requester = session()->get('password_reset_requester');
            $requester['confirmed'] = true;
            session()->put('password_reset_requester', $requester);
            return redirect()->route('password-change');
        }
        return redirect()->route('forget-password');
    }
    public function passwordChangeView()
    {
        return view('auth.passwords.change-password');
    }
    public function changePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:6|confirmed'
        ]);
        $requester = session()->get('password_reset_requester');
        if($requester['confirmed']){
            $user = User::where('phone', $requester['phone'])->first();
            $newPassword = Hash::make($request->password);
            $user->password = $newPassword;
            $user->save();
            session()->forget('password_reset_requester');
            session()->save();
            return redirect('login');
        }
        return redirect()->route('forget-password');
    }
}

<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Helper\TwilioSMS;
use Exception;
use Illuminate\Support\Facades\Hash;

class PasswordResetController extends Controller
{
    public function phoneConfirmation(Request $request)
    {
        try {
            $request->validate([
                'country_code' => 'required',
                'phone' => 'required|max:10|min:9'
            ]);
            $phone = phoneMerge($request->country_code, $request->phone);

            $user = User::where('phone', $request->phone)->first();
            if ($user) {
                $code = rand(1000, 9999);
                $requester = ['phone' => $request->phone, 'dial_code' => $request->country_code, 'code' => $code, 'confirmed' => false];
                session()->put('password_reset_requester', $requester);
                $twilio = new TwilioSMS();
                $twilio->sendMessage('This is your Arabi phone verification code ' . $code, $phone);
                return ['status' => 'success', 'message' => '4 digit code sent to ' . $phone];
            } else {
                return ['status' => 'error', 'message' => 'user not found'];
            }
        } catch (Exception $e) {
            return ['exception' => $e];
        }
    }
    public function codeVerification(Request $request)
    {
        try {
            $request->validate([
                'confirmation_code' => 'required|numeric|digits:4',
            ]);
            if ($request->confirmation_code == session()->get('password_reset_requester')['code']) {
                $requester = session()->get('password_reset_requester');
                $requester['confirmed'] = true;
                session()->put('password_reset_requester', $requester);
                return ['status' => 'success', 'message' => 'now you can change your password within this session'];
            }
            return ['status' => 'errorr', 'message' => 'Code doesn\'t mach our record'];
        } catch (Exception $e) {
            return ['exception' => $e];
        }
    }
    public function resetPassword(Request $request)
    {
        try {
            $request->validate([
                'password' => 'required|min:6|confirmed'
            ]);
            $requester = session()->get('password_reset_requester');
            if ($requester['confirmed']) {
                $user = User::where('phone', $requester['phone'])->first();
                $newPassword = Hash::make($request->password);
                $user->password = $newPassword;
                $user->save();
                session()->forget('password_reset_requester');
                session()->save();
                return ['status' => 'success', 'message' => 'You have successfully updated your password. Now you can login with new password!'];
            }
        } catch (Exception $e) {
            return ['exception' => $e];
        }
    }
}
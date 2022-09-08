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
        $phone = phoneMerge($request->country_code, $request->phone);

        $user = User::where('phone', $request->phone)->first();
        if ($user) {
            $code = rand(1000, 9999);
            $requester = ['phone' => $request->phone, 'dial_code' => $request->country_code, 'code' => $code, 'confirmed' => false];
            session()->put('password_reset_requester', $requester);
            $twilio = new TwilioSMS();
            $twilio->sendMessage('This is your Arabi phone verification code ' . $code, $phone);
            
            $alert = ['title' => 'Message sent to your phone', 'position' => 'center', 'showConfirmButton' => true,'icon' => 'info', 'timer' => 3000];
            session()->flash('alert', $alert);
            return redirect('confirm-phone');
        } else {
            $alert = ['title' => 'Your account not found!','message' => 'We are unable to find your account,please make sure the phone is correct!', 'position' => 'center', 'showConfirmButton' => true,'icon' => 'info', 'timer' => 5000];
            session()->flash('alert', $alert);
            return back();
        }
    }
    public function codeResend()
    {
        $requester = session()->get('password_reset_requester');
        $code = rand(1000, 9999);
        $requester['code'] = $code;
        session()->put('password_reset_requester', $requester);
        $phone = phoneMerge($requester['dial_code'],$requester['phone']);
        $twilio = new TwilioSMS();
        $twilio->sendMessage('This is your Arabi phone verification code ' . $code, $phone);
        $alert = ['title' => 'We have sent a code to your phone', 'position' => 'center', 'showConfirmButton' => true,'icon' => 'info', 'timer' => 3000];
        session()->flash('alert', $alert);    
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
        $alert = ['title' => 'The code you entered is not correct','message' => 'Code doesn\'t mach our record', 'position' => 'center', 'showConfirmButton' => true,'icon' => 'info', 'timer' => 3000];
        session()->flash('alert', $alert);    
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
            $alert = ['title' => 'You have successfully updated your password','message' => 'You can login with new password!', 'position' => 'center', 'showConfirmButton' => true,'icon' => 'info', 'timer' => 3000];
            session()->flash('alert', $alert);    
            return redirect('login');
        }
        return redirect()->route('forget-password');
    }
}

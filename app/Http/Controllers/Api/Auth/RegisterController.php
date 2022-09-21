<?php

namespace App\Http\Controllers\Api\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Laravel\Fortify\Contracts\CreatesNewUsers;
use App\Models\Role;
use App\Http\Controllers\Controller;
use Exception;
use App\Helper\TwilioSMS;
use App\Http\Requests\ConfirmCodeRequest;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $input = $request->all();
        try {
            if (!($request->user_type == 'supplier' || $request->user_type == 'customer')) {
                return response()->json(['error' => 'Field user_type should have either supplier or customer values']);
            }
            $input = $request->validated();
            $location = null;

            if ($input['document']) {
                $location = $input['document']->store('public/documents');
                $location = substr($location, 7);
            }
            $user =  User::create([
                'fullname' => $input['fullname'],
                'email' => $input['email'],
                'phone' => $input['phone'],
                'dial_code' => $input['dial_code'],
                'tin_number' => $input['tin_number'],
                'document_url' => $location,
                'password' => Hash::make($input['password']),
            ]);

            $role = Role::where('slug', $input['user_type'])->first()->id;
            $status = 'pending';
            if ($input['user_type'] == 'customer') {
                $status = 'approved';
            }
            $user->roles()->attach($role, ['status' => $status]);
            $token = $user->createToken('API TOKEN');
            $user = $user->with('roles')->where('id', $user->id)->first();
            return ['token' => $token->plainTextToken, 'user' => $user];
        } catch (Exception $e) {
            return ['exception' => $e->getMessage()];
        }
    }
    public function sendVerification()
    {
        try {
            $user = auth()->user();
            $phone = phoneMerge($user->dial_code, $user->phone);
            $twilio = new TwilioSMS();
            $twilio->sendVerificationCode($phone);
            return response()->json(['status' => 'success']);
        } 
        catch (Exception $e) {
            return response()->json(['exception' => $e->getMessage()]);
        }
    }
    public function verifyPhone(ConfirmCodeRequest $request)
    {
        try {
            $request->validated();
            if ($request->confirmation_code == session()->get('short_code')) {
                $user = User::find(auth()->id());
                $user->phone_verified_at = now()->toDateTimeString();
                $user->save();
                session()->forget('short_code');
                session()->save();
                return ['status' => 'success','message' => 'Phone number verified successfully'];
            }
            return ['status' => 'error','message' => 'Phone number is not verified'];
        } catch (Exception $e) {
            return ['exception' => $e->getMessage()];
        }
    }
}

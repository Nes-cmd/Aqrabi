<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use App\Models\Supplier;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $input = $request->all();
        try{
            Validator::make($input, [
                'fullname' => ['required', 'string', 'max:255'],
                'phone' => ['required', 'string', 'max:15', Rule::unique(User::class)],
                'email' => ['required','string', 'email','max:255',Rule::unique(User::class),],
                'password' => ['required', 'confirmed', 'min:6'],
                'user_type' => 'required'
            ])->validate();
            $user = User::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'phone' => $input['phone'],
                'password' => Hash::make($input['password']),
            ]);
            $$token = $user->createToken('API TOKEN');
            return ['token' => $token->plainTextToken, 'user' => $user];
        }
        catch (Exception $e){
            return ['exception' => $e];
        }
    }
}

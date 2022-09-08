<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        try{
            $request->validate([
                'phone' => 'required',
                'password' => 'required',
            ]);  
            $user = User::where('phone', $request->phone)->first();
            if($user && Hash::check($request->password, $user->password)){
                $token = $user->createToken('API TOKEN');
                $user = $user->with('roles')->where('id', $user->id)->get();

                return ['token' => $token->plainTextToken, 'user' => $user];
            }
            else{
                return ['status' => 'user not found'];
            }
        }
        catch (Exception $e){
            return response()->json(['exception' => $e]);
        } 
    }
}

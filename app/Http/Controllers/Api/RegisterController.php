<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use App\Models\Role;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(Request $request)
    {
        $input = $request->all();
        try{
            if(!($request->user_type == 'supplier' || $request->user_type == 'customer')){
                return response()->json(['error' => 'Field user_type should have either supplier or customer values']);
            }
            Validator::make($input, [
                'fullname' => ['required', 'string', 'max:255'],
                'phone' => ['required', 'string', 'max:15', Rule::unique(User::class)],
                'email' => ['required','string', 'email','max:255',Rule::unique(User::class),],
                'password' => ['required', 'confirmed', 'min:6'],
                'user_type' => 'required',
                'tin_number' => ['nullable', 'min:3'],
                'document' => ['nullable', 'file'],
            ])->validate();
           
            $location = null;
            
            if($input['document']){
                $location = $input['document']->store('public/documents');
                $location = substr($location, 7);
            }
            
            $user =  User::create([
                'fullname' => $input['fullname'],
                'email' => $input['email'],
                'phone' => $input['phone'],
                'tin_number' => $input['tin_number'],
                'document_url' => $location,
                'password' => Hash::make($input['password']),
            ]);

            $role = Role::where('slug', $input['user_type'])->first()->id;
            $status = 'pending';
            if($input['user_type'] == 'customer'){
                $status = 'approved';
            }
            $user->roles()->attach($role, ['status' => $status]);
            $token = $user->createToken('API TOKEN');
            $user = $user->with('roles')->where('id', $user->id)->first();
            return ['token' => $token->plainTextToken, 'user' => $user];
        }
        catch (Exception $e){
            return ['exception' => $e];
        }
    }
}

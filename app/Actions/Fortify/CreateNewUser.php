<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use App\Models\Role;
use Illuminate\Http\Request;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
       
        Validator::make($input, [
            'fullname' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:15', Rule::unique(User::class)],
            'email' => ['required','string', 'email','max:255',Rule::unique(User::class),],
            'password' => $this->passwordRules(),
            'tin_number' => ['nullable', 'min:3'],
            'user_type' => 'required',
            'document_url' => ['nullable', 'file'],
        ])->validate();
        $location = null;
        // dd($input['document_url']->put());
        if($input['document_url']){
            $location = $input['document_url']->store('public/documents');
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
        if($input['user_type' == 'customer']){
            $status = 'approved';
        }
        $user->roles()->attach($role, ['status' => $status]);
        return $user;
        
    }
}

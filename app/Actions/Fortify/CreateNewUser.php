<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use App\Models\Role;

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
            'phone' => ['required', 'string', 'min:9','max:10', Rule::unique(User::class)],
            'email' => ['required','string', 'email','max:255',Rule::unique(User::class),],
            'password' => $this->passwordRules(),
            'tin_number' => ['nullable', 'min:3'],
            'country_code' => 'required',
            'document_url' => ['nullable', 'file'],
        ])->validate();
        $location = null;
        if(array_key_exists('document_url', $input)){
            $location = $input['document_url']->store('public/documents');
            $location = substr($location, 7);
        }
        
        $user =  User::create([
            'fullname' => $input['fullname'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'tin_number' => $input['tin_number'],
            'dial_code' => $input['country_code'],
            'document_url' => $location,
            'password' => Hash::make($input['password']),
        ]);
        $role = Role::where('slug', $input['user_type'])->first()->id;
        $status = 'pending';
        if($input['user_type'] == 'customer'){
            $status = 'approved';
        }
        $user->roles()->attach($role, ['status' => $status]);
        return $user;
    }
}

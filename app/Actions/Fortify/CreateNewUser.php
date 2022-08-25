<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use App\Models\Supplier;

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
            'user_type' => 'required'
        ])->validate();
        if($input['user_type'] == 'supplier'){
            return Supplier::create([
                'name' => $input['name'],
                'phone' => $input['phone'],
                'email' => $input['email'],
                'password' => Hash::make($input['password']),
            ]);
        }
        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'phone' => $input['phone'],
            'password' => Hash::make($input['password']),
        ]);
        
    }
}

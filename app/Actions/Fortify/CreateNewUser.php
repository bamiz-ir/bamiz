<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Laravel\Fortify\Contracts\CreatesNewUsers;

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'username' => ['required' , 'max:255'],
            'phone' => ['required' , 'numeric'],
            'g-recaptcha-response' => 'required|captcha'
        ] , [
            'g-recaptcha-response.required' => 'لطفا گزینه "من ربات نیستم" را تایید کنید.',
            'g-recaptcha-response.captcha' => 'خطا در ریکپچا ! لطفا صفحه را رفرش کنید و دوباره تلاش کنید.'
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'username' => $input['username'],
            'phone' => $input['phone'],
        ]);
    }
}

<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\Admin_info
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            // 'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique(User::class),],
            // 'phone_number' => ['required', 'string', 'max:13'],
            'password' => $this->passwordRules(),
            // 'first_question' => ['required', 'string', 'max:255'],
            // 'first_answer' => ['required', 'string', 'max:40'],
            // 'second_question' => ['required', 'string', 'max:255'],
            // 'second_answer' => ['required', 'string', 'max:40'],
            // 'third_question' => ['required', 'string', 'max:255'],
            // 'third_answer' => ['required', 'string', 'max:40'],
        ])->validate();

        return User::create([
            'name' => $input['name'],
            // 'last_name' => $input['last_name'],
            'email' => $input['email'],
            // 'phone_number' => $input['phone_number'],
            'password' => Hash::make($input['password']),
            // 'password' => $input['password'],
            // 'first_question' => $input['first_question'],
            // 'first_answer' => $input['first_answer'],
            // 'second_question' => $input['second_question'],
            // 'second_answer' => $input['second_answer'],
            // 'third_question' => $input['third_question'],
            // 'third_answer' => $input['third_answer'],

        ]);
    }
}

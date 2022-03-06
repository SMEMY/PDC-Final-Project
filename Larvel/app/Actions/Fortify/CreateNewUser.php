<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\Role;
use App\Models\User_info;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;
// use App\Models\User;

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
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique(User::class),],
            'phone_number' => ['required', 'string', 'max:13'],
            'password' => $this->passwordRules(),
            'first_question' => ['required', 'string', 'max:255'],
            'first_answer' => ['required', 'string', 'max:40'],
            'second_question' => ['required', 'string', 'max:255'],
            'second_answer' => ['required', 'string', 'max:40'],
            'third_question' => ['required', 'string', 'max:255'],
            'third_answer' => ['required', 'string', 'max:40'],
        ])->validate();
        // return $input['role'];
        $admin =  Role::create([
            'name' => 'admin',
        ]);
        $admin =  Role::create([
            'name' => 'facilitator',
        ]);
        $admin =  Role::create([
            'name' => 'participant',
        ]);
        $admin =  User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'f_q' => $input['first_question'],
            'f_a' => Hash::make($input['first_answer']),
            's_q' => $input['second_question'],
            's_a' => Hash::make($input['second_answer']),
            't_q' => $input['third_question'],
            't_a' => Hash::make($input['third_answer']),
        ]);

        $admin_info =  User_info::create([
            'user_id' => $admin->id,
            'last_name' => $input['last_name'],
            'phone_number' => $input['phone_number'],
        ]);

        DB::table('role_user')->insert([
            'user_id' => $admin->id,
            'role_id' => 1
        ]);

        return $admin;
    }
}

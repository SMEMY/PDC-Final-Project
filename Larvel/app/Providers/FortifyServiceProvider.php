<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use App\Models\Admin_info;
use App\Models\User;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Gate;

class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

        RateLimiter::for('login', function (Request $request) {
            $email = (string) $request->email;

            return Limit::perMinute(5)->by($email . $request->ip());
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });

        // return $users;
        Fortify::registerView(
            function () {
                // return $users = User::all();
                $users = User::all();
                if (count($users) == 0) {
                    return view(view: ('admin.admin-registeration'));
                } elseif (count($users) != 0) {
                    return view(view: ('users.facilitatorParticipantRegisteration'));
                }
            }
        );
        // Fortify::registerView(
        //     function () {
        //         return view(view: ('users.facilitatorParticipantRegisteration'));
        //     }
        // );

        Fortify::loginView(
            function () {
                return view(view: ('login'));
            }
        );



        // Fortify::authenticateUsing(function (Request $request) {
        //     $user = User::where('email', $request->email)->first();

        //     if ($user && Hash::check($request->password, $user->password)) {
        //         return $user;
        //     }
        // });
    }
}

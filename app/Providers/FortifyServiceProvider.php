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
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\Contracts\LoginResponse;
use Laravel\Fortify\Contracts\RegisterResponse;

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
            $phone = (string) $request->phone;
            return Limit::perMinute(5)->by($phone.$request->ip());
        });

        Fortify::loginView(function () {
            return view('auth.login');
        });
        $this->app->instance(LoginResponse::class, new class implements LoginResponse {
            public function toResponse($request)
            {
                if(auth()->user()->phone_verified_at == null){
                    return redirect()->route('phone-verification');
                }
                if(auth()->user()->hasVerifiedRole('admin')){
                    return redirect('/admin');
                }
                return redirect()->intended(RouteServiceProvider::HOME);
            }
        });

        $this->app->instance(RegisterResponse::class, new class implements RegisterResponse {
            public function toResponse($request)
            {
                if(auth()->user()->phone_verified_at == null){
                    return redirect()->route('verify-phone');
                }
                return redirect()->intended(RouteServiceProvider::HOME);
            }
        });
        
        Fortify::authenticateUsing(function (Request $request) {
            $request->validate([
                'phone' => 'required|max:14|min:9',
                'password' => 'required|min:6'
            ]);
            $user = User::where('phone', $request->phone)->first();
            if ($user &&
                Hash::check($request->password, $user->password)) {
                return $user;
            }
            return null;
        });

        Fortify::registerView(function () {
            return view('auth.register');
        });

        Fortify::loginView(function () {
            return view('auth.login');
        });

        // Fortify::verifyEmailView(function () {
        //     return view('auth.verify');
        // });

        Fortify::requestPasswordResetLinkView(function () {
            return view('auth.passwords.reset');
        });
        
        
    }
}

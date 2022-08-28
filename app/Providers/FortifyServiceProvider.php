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
use App\Filament\Pages\Settings;
use App\Filament\Resources\ProductResource;
use Filament\Facades\Filament;
use Filament\Navigation\NavigationBuilder;
use Filament\Navigation\NavigationItem;
use Filament\Navigation\UserMenuItem;

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

        // RateLimiter::for('two-factor', function (Request $request) {
        //     return Limit::perMinute(5)->by($request->session()->get('login.id'));
        // });

        Fortify::loginView(function () {
            return view('auth.login');
        });
        Fortify::authenticateUsing(function (Request $request) {
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
        // Filament::navigation(function (NavigationBuilder $builder): NavigationBuilder {
        //     return $builder->items([
        //         NavigationItem::make('Dashboard')
        //             ->icon('heroicon-o-home')
        //             ->isActiveWhen(fn (): bool => request()->routeIs('filament.pages.dashboard'))
        //             ->url(route('filament.pages.dashboard')),
        //         ...ProductResource::getNavigationItems(),
        //     ]);
        // });
        // Filament::serving(function () {
        //     Filament::registerUserMenuItems([
        //         UserMenuItem::make()
        //             ->label('Settings')
        //             ->url(route('filament.pages.account'))
        //             ->icon('heroicon-s-cog'),
        //         // ...
        //     ]);
        // });
    }
}

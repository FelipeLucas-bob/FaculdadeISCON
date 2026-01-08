<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use App\Models\User;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Actions\RedirectIfTwoFactorAuthenticatable;
use Laravel\Fortify\Fortify;
use Illuminate\Support\Facades\Event;
use Laravel\Fortify\Events\Login;       // login bem-sucedido
use Laravel\Fortify\Events\FailedLogin; // login falho
use App\Models\LoginLogModel;


class FortifyServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);
        Fortify::redirectUserForTwoFactorAuthenticationUsing(RedirectIfTwoFactorAuthenticatable::class);

        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())) . '|' . $request->ip());
            return Limit::perMinute(5)->by($throttleKey);
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });

        Fortify::loginView(function () {
            return view('admin.auth.boxed.sign-in');
        });

        Fortify::authenticateUsing(function (Request $request) {
            $user = User::where('email', $request->email)->first();

            // Login inválido
            if (! $user || ! Hash::check($request->password, $user->password)) {
                // Registra login falho
                LoginLogModel::create([
                    'email' => $request->email,
                    'ip_address' => $request->ip(),
                    'user_agent' => $request->header('User-Agent'),
                    'success' => false,
                ]);

                return null;
            }

            // Usuário inativo
            if (! $user->active) {
                throw ValidationException::withMessages([
                    Fortify::username() => __('Sua conta está inativa.'),
                ]);
            }

            // Atualiza status ativo no DB
            DB::table('user_status')
                ->where('user_id', $user->id)
                ->update(['status' => 1]);

            // Registra login bem-sucedido
            LoginLogModel::create([
                'user_id' => $user->id,
                'email' => $user->email,
                'ip_address' => $request->ip(),
                'user_agent' => $request->header('User-Agent'),
                'success' => true,
            ]);

            return $user;
        });

    }
}

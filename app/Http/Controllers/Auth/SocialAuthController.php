<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Throwable;

use function redirect;

abstract class SocialAuthController extends Controller
{
    abstract protected function getProvider(): string;

    public function redirect(): RedirectResponse
    {
        return Socialite::driver($this->getProvider())->redirect();
    }

    public function callback(): RedirectResponse
    {
        $provider = $this->getProvider();

        try {
            $user = Socialite::driver($provider)->user();
        } catch (Throwable $e) {
            return redirect('/login');
        }

        $existingUser = User::where([
            ['email', '=', $user->email],
            ['provider', '=', $provider],
            ['provider_id', '=', $user->id],
        ])->first();

        if ($existingUser) {
            Auth::login($existingUser, true);
        } else {
            $user = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'avatar' => $user->avatar,
                'provider' => $provider,
                'provider_id' => $user->id,
            ]);

            Auth::login($user, true);
        }

        return redirect('/');
    }
}

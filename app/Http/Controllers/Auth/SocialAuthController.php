<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\RedirectResponse;
use Laravel\Socialite\Facades\Socialite;

/**
 * Social Authentication controller.
 */
abstract class SocialAuthController extends Controller
{
    public function redirect(): RedirectResponse
    {
        return Socialite::driver($this->getProvider())->redirect();
    }

    /**
     * Callback handler.
     */
    public function callback()
    {
        $provider = $this->getProvider();

        try {
            $user = Socialite::driver($provider)->user();
        } catch (\Exception $e) {
            return \redirect('/login');
        }

        $existingUser = User::where([
            ['email', '=', $user->email],
            ['provider', '=', $provider],
            ['provider_id', '=', $user->id],
        ])->first();

        if ($existingUser) {
            auth()->login($existingUser, true);
        } else {
            $user = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'avatar' => $user->avatar,
                'provider' => $provider,
                'provider_id' => $user->id,
            ]);

            auth()->login($user, true);
        }

        return \redirect('/');
    }

    /**
     * Get the provider.
     */
    abstract protected function getProvider(): string;
}

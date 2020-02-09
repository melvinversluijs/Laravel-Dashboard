<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Laravel\Socialite\Facades\Socialite;
use Throwable;

use function redirect;

abstract class SocialAuthController extends Controller
{
    /**
     * Get the provider.
     */
    abstract protected function getProvider(): string;

    public function redirect(): RedirectResponse
    {
        return Socialite::driver($this->getProvider())->redirect();
    }

    /**
     * @return Redirector|RedirectResponse
     */
    public function callback()
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

        return redirect('/');
    }
}

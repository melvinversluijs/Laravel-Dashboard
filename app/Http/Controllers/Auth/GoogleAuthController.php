<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Laravel\Socialite\Facades\Socialite;

/**
 * Google Authentication controller.
 */
class GoogleAuthController extends Controller
{
    protected const PROVIDER = 'google';

    /**
     * Redirect to Google signin.
     *
     * @return void
     */
    public function redirect()
    {
        return Socialite::driver(self::PROVIDER)->redirect();
    }

    /**
     * Google callback handler
     *
     * @return void
     */
    public function callback()
    {
        try {
            $user = Socialite::driver(self::PROVIDER)->user();
        } catch (\Exception $e) {
            return \redirect('/login');
        }

        $existingUser = User::where([
            ['email', '=', $user->email],
            ['provider', '=', self::PROVIDER],
            ['provider_id', '=', $user->id],
        ])->first();

        if ($existingUser) {
            auth()->login($existingUser, true);
        } else {
            $user = User::create([
                'name'        => $user->name,
                'email'       => $user->email,
                'avatar'      => $user->avatar,
                'provider'    => self::PROVIDER,
                'provider_id' => $user->id,
            ]);

            auth()->login($user, true);

        }

        return \redirect('/');
    }
}

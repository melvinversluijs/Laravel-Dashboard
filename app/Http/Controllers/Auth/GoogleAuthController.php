<?php

namespace App\Http\Controllers\Auth;

/**
 * Google Authentication controller.
 */
class GoogleAuthController extends SocialAuthController
{
    /**
     * Get provider.
     *
     * @return string
     */
    protected function getProvider(): string
    {
        return 'google';
    }
}

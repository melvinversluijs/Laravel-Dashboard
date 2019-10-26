<?php

namespace App\Http\Controllers\Auth;

/**
 * Github Authentication controller.
 */
class GithubAuthController extends SocialAuthController
{
    /**
     * Return the provider.
     *
     * @return void
     */
    protected function getProvider(): string
    {
        return 'github';
    }
}

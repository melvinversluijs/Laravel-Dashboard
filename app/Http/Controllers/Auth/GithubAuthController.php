<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth;

class GithubAuthController extends SocialAuthController
{
    protected function getProvider(): string
    {
        return 'github';
    }
}

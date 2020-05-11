<?php

declare(strict_types=1);

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function testBasicTest(): void
    {
        $this->withExceptionHandling();
        $response = $this->get('/');
        $response->assertStatus(200);
    }
}

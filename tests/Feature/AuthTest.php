<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    public function test_returns_response_with_valid_request()
    {
        $user = [
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => 1234
        ];
        $response = $this->json('post', '/api/auth/register', $user);
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'success',
            'message',
            'data',
        ]);
    }
    
}

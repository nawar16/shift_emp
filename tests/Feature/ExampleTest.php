<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
<<<<<<< HEAD
    public function test_the_application_returns_a_successful_response()
=======
    public function test_example()
>>>>>>> edeeaa1b89af8af2dc16a2bda625163283dedbd2
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}

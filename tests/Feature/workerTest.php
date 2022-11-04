<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Worker;
<<<<<<< HEAD

class workerTest extends TestCase
{
   // use RefreshDatabase;
=======
use App\Models\Timezone;

class workerTest extends TestCase
{
    // use RefreshDatabase;
>>>>>>> edeeaa1b89af8af2dc16a2bda625163283dedbd2
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_workers_list()
    {
<<<<<<< HEAD
=======
        $timezone = Timezone::factory()->create();
>>>>>>> edeeaa1b89af8af2dc16a2bda625163283dedbd2
        $user = User::factory()->create();

        $this->actingAs($user);

        $worker = Worker::factory()->create();

        $this->json('GET', route('workers.index'))
        ->assertStatus(200);
    }

    public function test_add_worker()
    {
<<<<<<< HEAD
=======
        $timezone = Timezone::factory()->create();
>>>>>>> edeeaa1b89af8af2dc16a2bda625163283dedbd2
        $user = User::factory()->create();

        $this->actingAs($user);
      

        $formData = [
<<<<<<< HEAD
            "name" => "Test worker",
            "phone" => "1234567191",
            "email" => "test42@gmail.com",
=======
            "name" => "Test",
            "phone" => "1234567890",
            "email" => "test@gmail.com",
>>>>>>> edeeaa1b89af8af2dc16a2bda625163283dedbd2
            "timezoneId" => 1
        ];

        $this->json('POST', route('workers.store'), $formData)
        ->assertStatus(200);
    }

    public function test_show_worker()
    {
<<<<<<< HEAD
=======
        $timezone = Timezone::factory()->create();
>>>>>>> edeeaa1b89af8af2dc16a2bda625163283dedbd2
        $user = User::factory()->create();

        $this->actingAs($user);

        $worker = Worker::factory()->create();

        $this->get(route('workers.show', $worker->id))
        ->assertStatus(200);
    }

    public function test_edit_worker()
    {
<<<<<<< HEAD
=======
        $timezone = Timezone::factory()->create();
>>>>>>> edeeaa1b89af8af2dc16a2bda625163283dedbd2
        $user = User::factory()->create();

        $this->actingAs($user);
        
        $worker = Worker::factory()->create();

        $formData = [
<<<<<<< HEAD
            "name" => "Test worker",
            "phone" => "1234565151",
            "email" => "tes41@gmail.com",
=======
            "name" => "Test",
            "phone" => "1234567190",
            "email" => "test1@gmail.com",
>>>>>>> edeeaa1b89af8af2dc16a2bda625163283dedbd2
            "timezoneId" => 1
        ];

        $this->json('PUT', route('workers.update', $worker->id), $formData)
        ->assertStatus(200);
    }

    public function test_delete_worker()
    {
<<<<<<< HEAD
=======
        $timezone = Timezone::factory()->create();
>>>>>>> edeeaa1b89af8af2dc16a2bda625163283dedbd2
        $user = User::factory()->create();

        $this->actingAs($user);

        $worker = Worker::factory()->create();

        $this->delete(route('workers.destroy', $worker->id))
        ->assertStatus(200);
    }
}

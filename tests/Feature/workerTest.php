<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Worker;

class workerTest extends TestCase
{
   // use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_workers_list()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $worker = Worker::factory()->create();

        $this->json('GET', route('workers.index'))
        ->assertStatus(200);
    }

    public function test_add_worker()
    {
        $user = User::factory()->create();

        $this->actingAs($user);
      

        $formData = [
            "name" => "Test worker",
            "phone" => "1234567191",
            "email" => "test42@gmail.com",
            "timezoneId" => 1
        ];

        $this->json('POST', route('workers.store'), $formData)
        ->assertStatus(200);
    }

    public function test_show_worker()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $worker = Worker::factory()->create();

        $this->get(route('workers.show', $worker->id))
        ->assertStatus(200);
    }

    public function test_edit_worker()
    {
        $user = User::factory()->create();

        $this->actingAs($user);
        
        $worker = Worker::factory()->create();

        $formData = [
            "name" => "Test worker",
            "phone" => "1234565151",
            "email" => "tes41@gmail.com",
            "timezoneId" => 1
        ];

        $this->json('PUT', route('workers.update', $worker->id), $formData)
        ->assertStatus(200);
    }

    public function test_delete_worker()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $worker = Worker::factory()->create();

        $this->delete(route('workers.destroy', $worker->id))
        ->assertStatus(200);
    }
}

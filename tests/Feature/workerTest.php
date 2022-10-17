<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Worker;
use App\Models\TimeZone;

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
        $timezone = TimeZone::factory()->create();
        $user = User::factory()->create();

        $this->actingAs($user);

        $worker = Worker::factory()->create();

        $this->json('GET', route('workers.index'))
        ->assertStatus(200);
    }

    public function test_add_worker()
    {
        $timezone = TimeZone::factory()->create();
        $user = User::factory()->create();

        $this->actingAs($user);
      

        $formData = [
            "name" => "Test",
            "phone" => "1234567890",
            "email" => "test@gmail.com",
            "timezoneId" => 1
        ];

        $this->json('POST', route('workers.store'), $formData)
        ->assertStatus(200);
    }

    public function test_show_worker()
    {
        $timezone = TimeZone::factory()->create();
        $user = User::factory()->create();

        $this->actingAs($user);

        $worker = Worker::factory()->create();

        $this->get(route('workers.show', $worker->id))
        ->assertStatus(200);
    }

    public function test_edit_worker()
    {
        $timezone = TimeZone::factory()->create();
        $user = User::factory()->create();

        $this->actingAs($user);
        
        $worker = Worker::factory()->create();

        $formData = [
            "name" => "Test",
            "phone" => "1234567190",
            "email" => "test1@gmail.com",
            "timezoneId" => 1
        ];

        $this->json('PUT', route('workers.update', $worker->id), $formData)
        ->assertStatus(200);
    }

    public function test_delete_worker()
    {
        $timezone = TimeZone::factory()->create();
        $user = User::factory()->create();

        $this->actingAs($user);

        $worker = Worker::factory()->create();

        $this->delete(route('workers.destroy', $worker->id))
        ->assertStatus(200);
    }
}

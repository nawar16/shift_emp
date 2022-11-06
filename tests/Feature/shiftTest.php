<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\WorkerShift;
use App\Models\Worker;
use App\Models\Shift;
use App\Models\Timezone;

class shiftTest extends TestCase
{
    //use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_shifts_list()
    {
        $user = User::factory()->create();

        $this->actingAs($user);


        $this->json('GET', route('shifts.index'))
        ->assertStatus(200);
    }

    public function test_assign_shifts()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $timezone = Timezone::factory()->create();
        
        $worker = Worker::factory()->create();
        
        $shift = Shift::factory()->create();

        $formData = [
            "workerShifts" => [
                [
                    "shiftId" => $shift->id,
                    "shiftDay" => "2022-12-02"
                ]
            ]
        ];

        $this->json('POST', route('shifts.assign', $worker->id), $formData)
        ->assertStatus(200);
    }


    public function test_delete_shift_worker()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $workerShift = WorkerShift::factory()->create();

        $this->delete(route('shifts.destroy', $workerShift->id))
        ->assertStatus(200);
    }
}

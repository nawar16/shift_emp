<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\WorkerShift;
use App\Models\Worker;
use App\Models\Shift;

class shiftTest extends TestCase
{
   // use RefreshDatabase;
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
      
        $worker = Worker::factory()->create();

        $shift = Shift::factory()->create();

        $shift1 = Shift::factory()->create();

        

        $formData = [
            "workerShifts" => [
                [
                    "shiftId" => $shift->id,
                    "shiftDay" => "2022-11-29"
                ],
                [
                    "shiftId" => $shift1->id,
                    "shiftDay" => "2022-11-30"
                ]

            ]
        ];

        $this->json('POST', route('shifts.assign', $worker->id), $formData)
        ->assertStatus(200);
    }


    public function test_update_shift_worker()
    {
        $user = User::factory()->create();

        $this->actingAs($user);
      
        $worker = Worker::factory()->create();

        $shift = Shift::factory()->create();

        $shiftWorker = WorkerShift::factory()->create();

        $formData = [
            "workerShifts" => [
                [
                    "workerShiftId" => $shiftWorker->id,
                    "shiftId" => 1,
                    "shiftDay" => "2022-12-02"
                ]
            ]
        ];

        $this->json('PUT', route('shifts.update', 1), $formData)
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

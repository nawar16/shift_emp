<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Shift;

class ShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $shifts = [['00:00','08:00'], ['08:00','16:00'], ['16:00', '24:00']];
        foreach($shifts as $shift){
            Shift::create([
                'start' => $shift[0],
                'end' => $shift[1],
            ]);
        }

    }
}

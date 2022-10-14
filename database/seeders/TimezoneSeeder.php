<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Timezone;

class TimezoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $timeZones = [
            "Africa/Abidjan" => "+00:00",
            "America/Anguilla" => "-04:00",
            "Poland" => "+01:00"
        ];
        
        foreach ($timeZones as $key => $value) {
            Timezone::create([
                'title' => $key,
                'utc_offset' => $value
            ]);
        }
        
    }
}

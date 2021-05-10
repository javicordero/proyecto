<?php

namespace Database\Seeders;


use App\Models\People;
use App\Models\Coach;
use Illuminate\Database\Seeder;

class CoachSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Coach::factory()->count(5)->create();

        $coaches = Coach::all();
        foreach($coaches as $coach){
            $person = People::factory()->create();
            $coach->person()->save($person);
        }
    }
}

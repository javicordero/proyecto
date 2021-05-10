<?php

namespace Database\Seeders;

use App\Models\People;
use App\Models\Player;
use Illuminate\Database\Seeder;

class PeopleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // People::factory()->count(5)->create();


        //$player->save();
        /*$people = People::all();
        foreach($people as $person){
            $player = new Player();
            $person->personable()->save($player);
        }*/
    }
}

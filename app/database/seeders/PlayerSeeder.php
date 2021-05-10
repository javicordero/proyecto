<?php

namespace Database\Seeders;

use App\Models\People;
use App\Models\Player;
use Illuminate\Database\Seeder;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Player::factory()->count(5)->create();

        $players = Player::all();
        foreach($players as $player){
            $person = People::factory()->create();
            $player->person()->save($person);
        }
    }
}

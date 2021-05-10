<?php

namespace Database\Seeders;

use App\Models\People;
use App\Models\Player;
use App\Models\Attribute;
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
        Player::factory()->count(2)->create();

        $players = Player::all();
        foreach($players as $player){
            $person = People::factory()->create();
            $player->person()->save($person);
        }

        //Crea
        $attributes = Attribute::all();
        foreach($players as $player){
            foreach($attributes as $attribute){
                $player->attributes()->attach($attribute, ['value' => rand(1,20)]);
            }

        }


    }
}

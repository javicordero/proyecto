<?php

namespace Database\Seeders;

use Faker\Factory;
use Faker\Generator;
use App\Models\People;
use App\Models\Player;
use App\Models\Attribute;
use App\Models\Contract;
use Illuminate\Database\Seeder;
use Illuminate\Container\Container;

class PlayerSeeder extends Seeder
{
     /**
     * The current Faker instance.
     *
     * @var \Faker\Generator
     */
    protected $faker;

    /**
     * Create a new seeder instance.
     *
     * @return void
     */
    public function __construct(){
        $this->faker = $this->withFaker();
    }

    /**
     * Get a new Faker instance.
     *
     * @return \Faker\Generator
     */
    protected function withFaker(){
        return Container::getInstance()->make(Generator::class);
    }

    public function run()
    {
        Player::factory()->count(45)->create();

        $players = Player::all();
        //Guarda una persona para cada jugador
        foreach($players as $player){
            $person = People::factory()->create();
            $player->person()->save($person);


        }

        //Asigna valores random a los atributos del jugador en fechas distintas
        $attributes = Attribute::all();
        foreach($players as $player){
            for($i = 0; $i < 8; $i++){
                foreach($attributes as $attribute){
                    $player->attributes()->attach($attribute, ['value' => rand(1,20), 'date' => $this->faker->date()]);
                }
            }
        }

    }
}

<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\Team;
use Faker\Generator;
use App\Models\People;
use App\Models\Player;
use App\Models\Contract;
use App\Models\Attribute;
use Illuminate\Database\Seeder;
use Faker\Provider\cs_CZ\DateTime;
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
        $players = Player::all();
        //Guarda una persona para cada jugador
        for($i = 1; $i < count($players) / 2; $i++){
            $player = Player::find($i);
            $person = $player->person;


            //Guarda contrato actual para cada jugador
            $team = Team::where('gender', $player->person->gender)->where('category_id', $player->category)->first();
            $contract1 = new Contract();
            $contract1->team_id = $team->id;
            $contract1->people_id = $person->id;
            $contract1->date_start = '2020-09-15';
            $contract1->date_end = null;
            $contract1->save();
        }


        for($i = (count($players) / 2) + 1; $i < count($players); $i++){
            $player = Player::find($i);
            $person = $player->person;


            //Guarda contrato actual para cada jugador
            $team = Team::where('gender', $player->person->gender)->where('category_id', $player->category)->latest('id')->first();
            $contract1 = new Contract();
            $contract1->team_id = $team->id;
            $contract1->people_id = $person->id;
            $contract1->date_start = '2020-09-15';
            $contract1->date_end = null;
            $contract1->save();
        }



        //Asigna valores random a los atributos del jugador en fechas distintas
        $attributes = Attribute::all();
        foreach($players as $player){
            for($i = 0; $i < 5; $i++){
                foreach($attributes as $attribute){
                    $player->attributes()->attach($attribute, ['value' => rand(1,20), 'date' => $this->faker->dateTimeThisYear()]);
                }
            }
        }

    }
}

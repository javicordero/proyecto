<?php

namespace Database\Seeders;


use Faker\Factory;
use App\Models\Game;
use App\Models\Team;
use Faker\Generator;
use Illuminate\Database\Seeder;
use Illuminate\Container\Container;

class GameSeeder extends Seeder
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

        //Genera partidos ya jugados
        Game::factory()->count(60)->create();

        $games = Game::all();

        //Genera los partidos con un maximo de 200 minutos entre todos los jugadores que participan
        foreach($games as $game){
            $totalMinutes = 200;
            $partner_numbers = array();
            foreach($game->team->getCurrentPlayers() as $player){
                //Máximo de 12 jugadores participantes en el partido
                if(count($partner_numbers) < 12){

                    $minutes = random_int(0,33);
                    while($totalMinutes - $minutes < 0){
                        $minutes = random_int(0,33);
                    }
                    $totalMinutes -= $minutes;

                        //Guarda puntos coherentes con los minutos
                    if($minutes == 0){
                        $points = 0;
                        $rebounds = 0;
                        $assists = 0;
                    }
                    elseif($minutes < 10){
                        $points = random_int(0,10);
                        $rebounds = random_int(0,5);
                        $assists = random_int(0,4);
                    }
                    elseif($minutes < 20){
                        $points = random_int(0,16);
                        $rebounds = random_int(0,10);
                        $assists = random_int(0,8);
                    }
                    elseif($minutes < 30){
                        $points = random_int(0,25);
                        $rebounds = random_int(0,15);
                        $assists = random_int(0,12);
                    }
                    else{
                        $points = random_int(0,34);
                        $rebounds = random_int(0,20);
                        $assists = random_int(0,15);
                    }


                        //Cambia el numero si dos jugadores tienen el mismo numero en este partido juega con otro
                    $number = $player->personable->number;
                    while(in_array($number, $partner_numbers)){
                        $number = random_int(0,20);
                    }

                    $partner_numbers[] = $number;


                        $game->players()->attach($player->id,
                    [
                        'points' => $points,
                        'minutes' => $minutes,
                        'number' => $number,
                        'rebounds' => $rebounds,
                        'assists' => $assists
                    ]);
                }
            }
        }

          //Genera partidos por jugar
        $teams = Team::all();
        foreach($teams as $team){
            for($i = 0; $i < 5; $i ++){
                $game = new Game();
                $game->date = $this->faker->dateTimeBetween(now(), '+3 months');
                $game->home = $this->faker->boolean();
                $game->played = false;
                $game->opponent_id = random_int(1,5);
                $game->team_id = $team->id;
                $game->save();
                }
            }



    }
}

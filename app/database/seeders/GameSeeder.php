<?php

namespace Database\Seeders;

use App\Models\Game;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Game::factory()->count(35)->create();

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
                    }
                    elseif($minutes < 10){
                        $points = random_int(0,10);
                    }
                    elseif($minutes < 20){
                        $points = random_int(0,16);
                    }
                    elseif($minutes < 30){
                        $points = random_int(0,25);
                    }
                    else{
                        $points = random_int(0,34);
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
                        'number' => $number
                    ]);
                }
            }
        }
    }
}

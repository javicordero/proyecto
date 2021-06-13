<?php

namespace Database\Seeders;


use Faker\Factory;
use App\Models\Game;
use App\Models\Team;
use App\Models\TeamPracticeDay;
use Faker\Generator;
use Illuminate\Database\Seeder;
use Illuminate\Container\Container;

class TeamPracticeDaySeeder extends Seeder
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
        $teams = Team::all();
        foreach($teams as $team){
            for($i = 0; $i < 3; $i++){
                $practiceDay = new TeamPracticeDay();
                $practiceDay->day = random_int(1,5);
                $practiceDay->time = $this->faker->time('H:i');
                $practiceDay->team_id = $team->id;
                $practiceDay->save();
            }
        }
    }
}

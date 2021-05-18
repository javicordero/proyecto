<?php

namespace Database\Seeders;

use Faker\Factory;
use Faker\Generator;
use App\Models\People;
use App\Models\Player;
use App\Models\Contract;
use Illuminate\Database\Seeder;
use Illuminate\Container\Container;

class PeopleSeeder extends Seeder
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
        //Crea 3 contratos para cada persona
        $people = People::all();

        foreach($people as $person){
        $contract1 = new Contract();
        $contract1->team_id = rand(1,5);
        $contract1->person_id = $person->id;
        $contract1->date_start = $this->faker->dateTimeThisDecade();
        $contract1->date_end = $this->faker->dateTimeBetween($contract1->date_start, now());
        $contract1->save();

        $contract2 = new Contract();
        $contract2->team_id = rand(1,5);
        $contract2->person_id = $person->id;
        $contract2->date_start = $contract1->date_end;
        $contract2->date_end = $this->faker->dateTimeBetween($contract2->date_start, now());
        $contract2->save();

        $contract3 = new Contract();
        $contract3->team_id = rand(1,5);
        $contract3->person_id = $person->id;
        $contract3->date_start = $contract2->date_end;
        //$contract3->date_end = $this->faker->dateTimeBetween($contract3->date_start, now());
        $contract3->save();

        //$person->contracts()->associate($contract1);
        //$person->contracts()->associate($contract2);
        //$person->contracts()->associate($contract3);
        }
    }
}

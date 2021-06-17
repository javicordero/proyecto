<?php

namespace Database\Seeders;

use App\Models\Coach;
use Faker\Factory;
use App\Models\User;
use Faker\Generator;
use App\Models\People;
use App\Models\Player;
use Illuminate\Support\Str;
use Faker\Provider\cs_CZ\DateTime;
use Illuminate\Database\Seeder;
use Illuminate\Container\Container;

class UserSeeder extends Seeder
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
        $user = new User();
        $user->name = 'admin';
        $user->password = bcrypt('admin');
        $user->email = 'admin@admin.com';
        $user->role = 1;
        $user->save();

        //Crea 300 jugadores
       for ($i = 0; $i < 300; $i++){
            $user = new User();
            $name = $this->faker->firstName();
            $userName = $name.random_int(0,1000);
            $user->name = $userName;
            $user->email = $this->faker->safeEmail();
            $user->password = bcrypt($userName);
            $user->remember_token = Str::random(10);
            $user->role = 3;
            $user->save();

            $player = new Player();
            $player->number = random_int(0,99);
            $player->save();

            $person = new People();
            $person->name = $name;
            $person->surname = $this->faker->lastName();
            $person->phone = $this->faker->phoneNumber();
            $person->gender = rand(0,1) ? 'masculino': 'femenino';
            $person->birth_date = DateTime::dateTimeBetween('-18 years', '-6 years');
            $person->user_id = $user->id;

            $player->person()->save($person);
            $person->save();


            if($person->gender == 'masculino'){
                $user->image = 'https://randomuser.me/api/portraits/men/'.random_int(0,100).'.jpg';
            }
            else{
                $user->image = 'https://randomuser.me/api/portraits/women/'.random_int(0,100).'.jpg';

            }

            $user->save();

       }


        //Crea 5 entrenadores
        for ($i = 0; $i < 5; $i++){
            $user = new User();
            $name = $this->faker->firstName();
            $userName = $name.random_int(0,1000);
            $user->name = $userName;
            $user->email = $this->faker->safeEmail();
            $user->password = bcrypt($userName);
            $user->remember_token = Str::random(10);
            $user->role = 2;
            $user->image = 'https://randomuser.me/api/portraits/men/'.random_int(0,100).'.jpg';
            $user->save();

            $coach = new Coach();
            $coach->save();

            $person = new People();
            $person->name = $name;
            $person->surname = $this->faker->lastName();
            $person->phone = $this->faker->phoneNumber();
            $person->gender = rand(0,1) ? 'masculino': 'femenino';
            $person->birth_date = DateTime::dateTimeBetween('-45 years', '-20 years');
            $person->user_id = $user->id;
            $coach->person()->save($person);
            $person->save();

        }


    }
}

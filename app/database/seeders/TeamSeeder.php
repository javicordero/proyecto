<?php

namespace Database\Seeders;


use Faker\Factory;
use Faker\Generator;
use App\Models\Team;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Container\Container;

class TeamSeeder extends Seeder
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

        $categories = Category::all();
        foreach ($categories as $category) {
            $team = new Team();
            $team->nickname = 'A';
            $team->gender = 'masculino';
            $team->category_id = $category->id;
            $team->save();

            $team = new Team();
            $team->nickname = 'B';
            $team->gender = 'masculino';
            $team->category_id = $category->id;
            $team->save();

            $team = new Team();
            $team->nickname = 'A';
            $team->gender = 'femenino';
            $team->category_id = $category->id;
            $team->save();

            $team = new Team();
            $team->nickname = 'B';
            $team->gender = 'femenino';
            $team->category_id = $category->id;
            $team->save();
        }
    }
}

<?php

namespace Database\Seeders;

use Faker\Factory;
use Faker\Generator;
use App\Models\Category;
use App\Models\Team;
use Illuminate\Database\Seeder;
use Illuminate\Container\Container;


class CategorySeeder extends Seeder
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
        $category = new Category();
        $category->name = 'Benjamín';
        $category->save();
        $category = new Category();
        $category->name = 'Alevín';
        $category->save();
        $category = new Category();
        $category->name = 'Infantil';
        $category->save();
        $category = new Category();
        $category->name = 'Cadete';
        $category->save();
        $category = new Category();
        $category->name = 'Junior';
        $category->save();



    }
}

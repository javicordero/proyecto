<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\Team;
use App\Models\People;
use App\Models\Player;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            AttributeTypeSeeder::class,
            CategorySeeder::class,
            TeamSeeder::class,
            PlayerSeeder::class,
            CoachSeeder::class,
            PeopleSeeder::class,
            GameSeeder::class
            //TeamSeeder::class
        ]);






    }
}

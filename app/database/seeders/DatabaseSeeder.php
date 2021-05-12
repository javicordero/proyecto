<?php

namespace Database\Seeders;

use App\Models\Player;
use Illuminate\Database\Seeder;
use App\Models\People;

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
            PlayerSeeder::class,
            CoachSeeder::class,
            CategorySeeder::class
        ]);





    }
}

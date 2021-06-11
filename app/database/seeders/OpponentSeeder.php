<?php

namespace Database\Seeders;

use App\Models\Opponent;
use Illuminate\Database\Seeder;

class OpponentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $opponent = new Opponent();
        $opponent->name = 'Isla Cristina';
        $opponent->save();

        $opponent = new Opponent();
        $opponent->name = 'Huelva';
        $opponent->save();

        $opponent = new Opponent();
        $opponent->name = 'Ayamonte';
        $opponent->save();

        $opponent = new Opponent();
        $opponent->name = 'Cartaya';
        $opponent->save();

        $opponent = new Opponent();
        $opponent->name = 'Aljaraque';
        $opponent->save();

    }
}

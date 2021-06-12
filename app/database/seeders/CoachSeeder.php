<?php

namespace Database\Seeders;


use App\Models\Team;
use App\Models\Coach;
use App\Models\People;
use App\Models\Contract;
use Illuminate\Database\Seeder;

class CoachSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $coach = Coach::find(1);
        $team = Team::find(1);
        $person = $coach->person;
        $contract1 = new Contract();
        $contract1->team_id = $team->id;
        $contract1->people_id = $person->id;
        $contract1->date_start = '2020-09-15';
        $contract1->date_end = null;
        $contract1->save();

        $coach = Coach::find(1);
        $team = Team::find(2);
        $person = $coach->person;
        $contract1 = new Contract();
        $contract1->team_id = $team->id;
        $contract1->people_id = $person->id;
        $contract1->date_start = '2020-09-15';
        $contract1->date_end = null;
        $contract1->save();

        $coach = Coach::find(2);
        $team = Team::find(3);
        $person = $coach->person;
        $contract1 = new Contract();
        $contract1->team_id = $team->id;
        $contract1->people_id = $person->id;
        $contract1->date_start = '2020-09-15';
        $contract1->date_end = null;
        $contract1->save();

        $coach = Coach::find(2);
        $team = Team::find(4);
        $person = $coach->person;
        $contract1 = new Contract();
        $contract1->team_id = $team->id;
        $contract1->people_id = $person->id;
        $contract1->date_start = '2020-09-15';
        $contract1->date_end = null;
        $contract1->save();

        $coach = Coach::find(3);
        $team = Team::find(5);
        $person = $coach->person;
        $contract1 = new Contract();
        $contract1->team_id = $team->id;
        $contract1->people_id = $person->id;
        $contract1->date_start = '2020-09-15';
        $contract1->date_end = null;
        $contract1->save();

        $coach = Coach::find(3);
        $team = Team::find(6);
        $person = $coach->person;
        $contract1 = new Contract();
        $contract1->team_id = $team->id;
        $contract1->people_id = $person->id;
        $contract1->date_start = '2020-09-15';
        $contract1->date_end = null;
        $contract1->save();

        $coach = Coach::find(4);
        $team = Team::find(7);
        $person = $coach->person;
        $contract1 = new Contract();
        $contract1->team_id = $team->id;
        $contract1->people_id = $person->id;
        $contract1->date_start = '2020-09-15';
        $contract1->date_end = null;
        $contract1->save();

        $coach = Coach::find(4);
        $team = Team::find(8);
        $person = $coach->person;
        $contract1 = new Contract();
        $contract1->team_id = $team->id;
        $contract1->people_id = $person->id;
        $contract1->date_start = '2020-09-15';
        $contract1->date_end = null;
        $contract1->save();

        $coach = Coach::find(5);
        $team = Team::find(9);
        $person = $coach->person;
        $contract1 = new Contract();
        $contract1->team_id = $team->id;
        $contract1->people_id = $person->id;
        $contract1->date_start = '2020-09-15';
        $contract1->date_end = null;
        $contract1->save();

        $coach = Coach::find(5);
        $team = Team::find(10);
        $person = $coach->person;
        $contract1 = new Contract();
        $contract1->team_id = $team->id;
        $contract1->people_id = $person->id;
        $contract1->date_start = '2020-09-15';
        $contract1->date_end = null;
        $contract1->save();

        $coach = Coach::find(1);
        $team = Team::find(11);
        $person = $coach->person;
        $contract1 = new Contract();
        $contract1->team_id = $team->id;
        $contract1->people_id = $person->id;
        $contract1->date_start = '2020-09-15';
        $contract1->date_end = null;
        $contract1->save();

        $coach = Coach::find(1);
        $team = Team::find(12);
        $person = $coach->person;
        $contract1 = new Contract();
        $contract1->team_id = $team->id;
        $contract1->people_id = $person->id;
        $contract1->date_start = '2020-09-15';
        $contract1->date_end = null;
        $contract1->save();

        $coach = Coach::find(2);
        $team = Team::find(13);
        $person = $coach->person;
        $contract1 = new Contract();
        $contract1->team_id = $team->id;
        $contract1->people_id = $person->id;
        $contract1->date_start = '2020-09-15';
        $contract1->date_end = null;
        $contract1->save();

        $coach = Coach::find(2);
        $team = Team::find(14);
        $person = $coach->person;
        $contract1 = new Contract();
        $contract1->team_id = $team->id;
        $contract1->people_id = $person->id;
        $contract1->date_start = '2020-09-15';
        $contract1->date_end = null;
        $contract1->save();

        $coach = Coach::find(3);
        $team = Team::find(15);
        $person = $coach->person;
        $contract1 = new Contract();
        $contract1->team_id = $team->id;
        $contract1->people_id = $person->id;
        $contract1->date_start = '2020-09-15';
        $contract1->date_end = null;
        $contract1->save();

        $coach = Coach::find(3);
        $team = Team::find(16);
        $person = $coach->person;
        $contract1 = new Contract();
        $contract1->team_id = $team->id;
        $contract1->people_id = $person->id;
        $contract1->date_start = '2020-09-15';
        $contract1->date_end = null;
        $contract1->save();

        $coach = Coach::find(4);
        $team = Team::find(17);
        $person = $coach->person;
        $contract1 = new Contract();
        $contract1->team_id = $team->id;
        $contract1->people_id = $person->id;
        $contract1->date_start = '2020-09-15';
        $contract1->date_end = null;
        $contract1->save();

        $coach = Coach::find(4);
        $team = Team::find(18);
        $person = $coach->person;
        $contract1 = new Contract();
        $contract1->team_id = $team->id;
        $contract1->people_id = $person->id;
        $contract1->date_start = '2020-09-15';
        $contract1->date_end = null;
        $contract1->save();

        $coach = Coach::find(5);
        $team = Team::find(19);
        $person = $coach->person;
        $contract1 = new Contract();
        $contract1->team_id = $team->id;
        $contract1->people_id = $person->id;
        $contract1->date_start = '2020-09-15';
        $contract1->date_end = null;
        $contract1->save();

        $coach = Coach::find(5);
        $team = Team::find(20);
        $person = $coach->person;
        $contract1 = new Contract();
        $contract1->team_id = $team->id;
        $contract1->people_id = $person->id;
        $contract1->date_start = '2020-09-15';
        $contract1->date_end = null;
        $contract1->save();

    }
}

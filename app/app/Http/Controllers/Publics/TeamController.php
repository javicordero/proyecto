<?php

namespace App\Http\Controllers\Publics;


use App\Models\Game;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{

    public function index(){
        $teams = Team::paginate(8);
        $data = compact('teams');
        return view('teams.index', compact('data'));
    }

    public function show($id){
        $team = Team::find($id);
        $players = $team->getCurrentPlayers();
        $data = compact('team', 'players');
        return view('teams.show', compact('data'));
    }
}

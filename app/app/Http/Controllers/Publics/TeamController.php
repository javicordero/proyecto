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
        $lastGames = Game::latest('date')->where('played', '1')->where('team_id', $team->id)->take(4)->get();
        $data = compact('team', 'players', 'lastGames');
        return view('teams.show', compact('data'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Opponent;
use App\Models\Team;
use Illuminate\Http\Request;

class GameController extends Controller
{

    public function index(){
        return Game::index();
    }

    public function show($id){
        $game = Game::find($id);
        return view('admin.games.show', compact('game'));
    }

    public function create(Request $request){
        $team = Team::find($request->teamId);
        $teams = Team::all();
        $opponents = Opponent::all();
        $data = compact('team', 'teams', 'opponents');
        return view('admin.games.create', compact('data'));
    }

    public function store(Request $request){
        $game = new Game();
        $game->date = $request->date;
        $game->played = 0;
        $game->home = $request->home;
        $game->opponent_id = $request->opponent;
        $game->team_id = $request->teamId;
        $game->save();

        /*$team = Team::find($request->teamId);
        foreach($team->getCurrentPlayers() as $player){
            $game->players()->save($player);
        }*/

        return back()->with('status', 'Partido creado');
    }
}

<?php

namespace App\Http\Controllers\Publics;


use App\Models\Game;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GameController extends Controller
{
    public function show($id){
        $game = Game::find($id);
        $players = $game->players()->orderByPivot('number', 'asc')->get();
        $scorers = $game->players()->orderByPivot('points', 'desc')->take(2)->get();
        $assisters = $game->players()->orderByPivot('assists', 'desc')->take(2)->get();
        $rebounders = $game->players()->orderByPivot('rebounds', 'desc')->take(2)->get();

        $data = compact('game', 'players', 'scorers', 'assisters', 'rebounders');

        return view('games.show', compact('data'));
    }

}

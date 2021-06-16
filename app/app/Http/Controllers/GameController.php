<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Team;
use App\Models\Opponent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GameController extends Controller
{

    public function index(){

        $games = Game::where('played',0)->get();
        if(Auth::user()->role == 1){
            $buttonList = [
                'create' => true,
                'delete' => true,
                'edit' => true
            ];
        }
        else{
            $buttonList = [
                'create' => false,
                'delete' => false,
                'edit' => false
            ];
        }

        $data = compact('games', 'buttonList');
        return view('admin.games.index', compact('data'));
    }

    public function results(){
        $games = Game::where('played',1)->get();
        $data = compact('games');
        return view('admin.results.index', compact('data'));
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

    public function destroy($id){
        $game = Game::find($id);
        $game->delete();
        return back()->with('status', 'Partido eliminado');
    }

    public function edit(Request $request){
        $game = Game::find($request->attributeId);
        $data = compact('game');
        return view('admin.games.edit', compact('data'));
    }

    public function update(Request $request, $id){
        $game = Game::find($id);
        $game->date = $request->date;
        $game->update();
        return back()->with('status', 'Partido actualizado');
    }

    public function addVideo(Request $request){
        $game = Game::find($request->attrId);
        $data = compact('game');
        return view('admin.results.addVideo', compact('data'));
    }

    public function addVideoStore(Request $request, $id){
        $game = Game::find($id);
        $game->video = $request->video;
        $game->save();
        return back()->with('status', 'Video actualizado');

    }


}

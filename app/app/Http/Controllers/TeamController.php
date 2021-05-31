<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\People;
use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index(){
        return Team::index();
    }


    public function destroy($id){
        return Team::deleteGeneric($id);
    }

    public function update(Request $request, $id){
        $team = Team::find($id);
        $team->nickname = $request->nickname;
        $team->update();
        return back()->with('status', 'Equipo actualizado');
    }

    public function store(Request $request){
        $team = new Team();
        $team->nickname = $request->nickname;
        $team->category_id = $request->category;
        $team->gender = $request->gender;
        $team->save();
        return back()->with('status', 'Equipo guardado');
    }

    public function show($id){
        $team = Team::find($id);
        $contracts = $team->getCurrentContracts();
        $players = $team->getCurrentPlayers();
        $nextGame = $team->games()->where('played', false)->orderBy('date', 'ASC')->first();
        $lastGames = $team->games()->where('played', true)->orderBy('date', 'DESC')->limit(5)->get();
        $nextGames = $team->games()->where('played', false)->orderBy('date', 'ASC')->limit(5)->get();
        $data = compact('team', 'contracts', 'players', 'nextGame','lastGames', 'nextGames');

        return view('teams.show', compact('data'));
    }

    public function practicesView(Request $request){
        return view('teams.practices');
    }

    public function create(){
        $categories = Category::pluck('name', 'id')->all();
        $data = compact('categories');
        return view('teams.create', compact('data'));
    }

    public function edit(Request $request){
        $team = Team::find($request->attributeId);
        $data = compact('team');
        return view('teams.edit', compact('data'));
    }

    public function getPosibleTeamsForPlayer(Request $request){
        $person = People::find($request->personId);

        $teams = Team::where('gender', $person->gender)
                        ->where('category_id', $person->personable->category)
                        ->where('id', '!=', $person->current_team->id)
                        ->get();
        $data = compact('teams', 'person');
        return view('teams.posible_teams_for_player', compact('data'));
    }


}

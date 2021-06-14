<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Team;
use App\Models\Coach;
use App\Models\People;
use App\Models\Player;
use App\Models\Category;
use App\Models\Contract;
use Illuminate\Http\Request;
use App\Models\TeamPracticeDay;

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

        //Guarda el contrato del entrenador
        $contract = new Contract();
        $contract->team_id = $team->id;
        $contract->people_id = $request->coach;
        $contract->date_start = now();
        $contract->date_end = null;
        $contract->save();
        return back()->with('status', 'Equipo guardado');
    }

    public function show($id){
        $team = Team::find($id);


        $contracts = $team->getCurrentContracts();
        $players = $team->getCurrentPlayers();
        $nextGame = $team->next_game;
        $lastGames = $team->games()->where('played', true)->orderBy('date', 'DESC')->limit(5)->get();
        $nextGames = $team->games()->where('played', false)->orderBy('date', 'ASC')->limit(5)->get();
        $data = compact('team', 'contracts', 'players', 'nextGame','lastGames', 'nextGames');

        return view('admin.teams.show', compact('data'));
    }


    public function create(){
        $categories = Category::pluck('name', 'id')->all();
        $coaches = Coach::all();
        $data = compact('categories', 'coaches');
        return view('admin.teams.create', compact('data'));
    }

    public function edit(Request $request){
        $team = Team::find($request->attributeId);
        $data = compact('team');
        return view('admin.teams.edit', compact('data'));
    }

    public function getPosibleTeamsForPlayer(Request $request){
        $person = People::find($request->personId);

        $teams = Team::where('gender', $person->gender)
                        ->where('category_id', $person->personable->category)
                        ->where('id', '!=', $person->current_team->id)
                        ->get();
        $data = compact('teams', 'person');
        return view('admin.teams.posible_teams_for_player', compact('data'));
    }

    public function getAllListablePlayers(Request $request){
        $team = Team::find($request->teamId);
        $teamPlayers = $team->getCurrentPlayers();
        $listablePlayers = $team->getListablePlayersFromOtherCategory();
        $data = compact('team', 'teamPlayers', 'listablePlayers');
        return view('admin.teams.listable_players', compact('data'));
    }


    public function savePlayersForNextGame(Request $request){
        $game = Game::find($request->gameId);

        //Quita los jugadores que estaban antes
        foreach($game->players as $player){
            $game->players()->detach($player);
        }

        //Añade los jugadores seleccionados
        foreach($request->players as $player){
            $player = Player::find($player);
            //Si el jugador tiene otro partido el mismo día lo quita del otro partido
            $gamesNotPlayed = $player->games()->where('played', 0)->get();
            foreach($gamesNotPlayed as $gameNotPlayed){
                if($game->date == $gameNotPlayed->date){
                    $gameNotPlayed->players()->detach($player);
                }
            }
            $game->players()->save($player);
        }
        return back()->with('status', 'Convocatoria guardada');
    }

    public function practicesView(Request $request){
        $team = Team::find($request->teamId);
        $data = compact('team');
        return view('admin.teams.practices', compact('data'));
    }

    public function savePraticesDays(Request $request, Team $id){
        for($i = 0; $i < 3; $i++){
            $practiceDay = new TeamPracticeDay();
            $practiceDay->day = $request->days[$i];
            $practiceDay->time = $request->times[$i];
            $practiceDay->team_id = $id->id;
            $practiceDay->save();
        }
        return back()->with('status', 'Días de entrenamientos guardados');

    }


    public function freePlayersForTeam(Request $request){
        $team = Team::find($request->teamId);

        $freePlayers = Player::freePlayers();

        $players = [];
        foreach($freePlayers as $player){
            if($player->category == $team->category->id && $team->gender == $player->person->gender){
                $players[] = $player;
            }
        }

        $hideBtn = false;

        if(empty($players)){
            $hideBtn = true;
        }

        $data = compact('team', 'players', 'hideBtn');
        return view('admin.teams.free_players_for_team', compact('data'));
    }

    public function savePlayersOnTeam(Request $request, $id){
        foreach($request->players as $playerId){
            //Crea uno nuevo
            $player = Player::find($playerId);
            $contract = new Contract();
            $contract->team_id = $id;
            $contract->people_id = $player->person->id;
            $contract->date_start = now();
            $contract->date_end = null;
            $contract->save();
        }
        return back()->with('status', 'Jugadores añadidos al equipo');

    }

}

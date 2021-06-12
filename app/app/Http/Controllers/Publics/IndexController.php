<?php

namespace App\Http\Controllers\Publics;

use Carbon\Carbon;
use App\Models\Game;
use App\Models\Team;
use App\Models\Coach;
use App\Models\People;
use App\Models\Player;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Traits\FormatearDate;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(){
        $nextGames = Game::where('played', 0)->orderBy('date', 'asc')->take(9)->get();
        $coaches = Coach::all();
        $lastGame = Game::latest('date')->where('played', '1')->first();
        $lastGames = Game::latest('date')->where('played', '1')->take(4)->get();
        $data = compact('nextGames', 'coaches', 'lastGame', 'lastGames');
        return view('index', compact('data'));
    }

    public function contact(){
        return view('contact');
    }

    public function results(Request $request){

        if($request){

            if($request->category){
                $category = $request->category;
                $teams = Team::where('category_id', $category);
            }
            else{
                $category = null;
                $teams = Team::query();
            }

            if($request->gender){
                $gender = $request->gender;
                $people = People::where('gender', $gender);
                $teams = $teams->where('gender', $gender)->get();
            }
            else{
                $people = People::query();
                $gender = null;
                $teams = $teams->get();
            }


            foreach($teams as $team){
                $teamsId[] = $team->id;
            }



            $games = Game::whereIn('team_id', $teamsId)->where('played', 1)->latest('date')->paginate(4)->appends('category', $category)->appends('gender', $gender);
            $people = $people->where('personable_type', 'App\Models\Player')->get();



            foreach($people as $people){
                $playersId[] = $people->personable->id;
            }
            $players = Player::whereIn('id', $playersId)->get();

            if($category){
                $players = $players->filter(function($player) use($category){
                    return $player->category == $category;
                });
            }


            if(!$category && !$gender){
                $players = Player::all();
            }
        }
        else{
            $games = Game::where('played', 1)->latest('date')->paginate(4);
            $players = Player::all();

        }

        $categories = Category::pluck('name', 'id')->all();


        $players = $players->map(function ($player) {
            $player['avg_points'] = $player->avg_points;
            $player['avg_rebounds'] = $player->avg_rebounds;
            $player['avg_assists'] = $player->avg_assists;
            return $player;
        });

        $scorers = $players->sortBy('avg_points', 0 ,true)->take(4);
        $rebounders = $players->sortBy('avg_rebounds', 0 ,true)->take(4);
        $assisters = $players->sortBy('avg_assists', 0 ,true)->take(4);



        $data = compact('games', 'scorers', 'rebounders', 'assisters', 'categories', 'category', 'gender');


        return view('results.index', compact('data'));
    }

}

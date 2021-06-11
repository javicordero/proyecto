<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Game;
use App\Models\Coach;
use Illuminate\Http\Request;
use App\Traits\FormatearDate;

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
}

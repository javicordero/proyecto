<?php

namespace App\Http\Controllers;


use App\Models\People;
use App\Models\Player;
use App\Traits\GenericTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlayerController extends Controller
{
    public function index(){
        return Player::index();
    }

    public function destroy($id){
        $player = Player::find($id);
        $player->delete();
        $player->person->delete();

        return back();
    }

    public function update(Request $request, $id){
        $player = Player::find($id);
        $player->size = $request->size;
        $player->save();
        $person = $player->person;

        return PeopleController::update($request, $person->id);
    }

    public function store(Request $request){
        $player = new Player();
        $player->size = $request->size;
        $player->save();

        return PeopleController::store($request, $player);
    }


}

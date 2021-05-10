<?php

namespace App\Http\Controllers;

use App\Models\AttributeType;
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

        return back()->with('status', 'Jugador eliminado');
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

    public function show($id){
        $player = Player::find($id);
        //return $player->attributes;
        $attributes = $player->attributes;
        $attribute_types = AttributeType::all();
        //return $player;
        //return $player->attributes;

        $data = compact('attributes', 'attribute_types', 'player');

        return view('players.profile', compact('data'));
    }


}

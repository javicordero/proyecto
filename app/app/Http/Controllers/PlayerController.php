<?php

namespace App\Http\Controllers;

use App\Models\People;
use App\Models\Player;
use App\Models\Attribute;
use App\Traits\GenericTable;
use Illuminate\Http\Request;
use App\Models\AttributeType;
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
        //$player->save();

       /* $attributes = Attribute::all();
        foreach($attributes as $attribute){
            $player->attributes()->attach($attribute);
        }*/


        //PeopleController::store($request, $player);
        return back()->with(['status' => 'player-created']);
    }

    public function show($id){

        $attribute = Attribute::find(1);

        //return $attribute->getPlayerValuesOfAttribute(4);



        $player = Player::find($id);
        $person = $player->person;

        $attribute_types = AttributeType::all();

        $data = compact('attribute_types', 'person', 'player');

        return view('people.profile', compact('data'));
    }



    public function getPlayerValuesOfAttribute(Request $request){

        $attribute = Attribute::find($request->attributeId);
        $player = Player::find($request->playerId);

        foreach($attribute->getPlayerValuesOfAttribute($player->id) as $at){
            $values [] = [
                'value' => $at->pivot->value,
                'date' => $at->pivot->date
            ];
        }

        $data = compact('attribute', 'player', 'values');
        return $data;
    }

    public function getDataForPlayersCreateAttributes(){
        $attribute_types = AttributeType::all();
        return view('players.create-attributes', compact('attribute_types'));
    }

}

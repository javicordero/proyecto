<?php

namespace App\Http\Controllers;

use App\Models\People;
use App\Models\Player;
use App\Models\Attribute;
use App\Traits\GenericTable;
use Illuminate\Http\Request;
use App\Models\AttributeType;
use App\Models\Game;
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

    public function create(){
        return view('admin.players.create');
    }

    public function store(Request $request){
        $player = new Player();
        $player->number = $request->number;
        $player->save();
        return PeopleController::store($request, $player);
    }

    public function edit(Request $request){
        $player = Player::find($request->attributeId);
        $data = compact('player');
        return view('admin.players.edit', compact('data'));
    }

    public function update(Request $request, $id){
        $player = Player::find($id);
        $player->number = $request->number;
        $player->update();
        $person = $player->person;

        return PeopleController::update($request, $person->id);
    }

    public function show($id){
        $player = Player::find($id);
        $person = $player->person;
        $attribute_types = AttributeType::all();
        $data = compact('attribute_types', 'person', 'player');

        return view('admin.people.profile', compact('data'));
    }



    public function getPlayerValuesOfAttribute(Request $request){
        $player = Player::find($request->playerId);
        $attributes = Attribute::all();
        $i = 0;

        foreach($attributes as $attribute){
            $datos [$i] = [
                'id' => $attribute->id,
                'name' => $attribute->name
            ];
            foreach($attribute->getPlayerValuesOfAttribute($player->id) as $at){
                $datos [$i][] = [
                    'value' => $at->pivot->value,
                    'date' => date('d-m-Y', strtotime($at->pivot->date)),
                ];
            }
            $i++;
        }

        return $datos;
        $data = compact('datos', 'player');
        return $data;
    }

    public function getDataForPlayersCreateAttributes(){
        $attribute_types = AttributeType::all();
        return view('admin.players.create-attributes', compact('attribute_types'));
    }

    public function removeFromTeam(Request $request){
        $player = Player::find($request->id);
        $contract = $player->person->current_contract;
        $contract->date_end = now();
        $contract->save();

        return back()->with('status','Jugador eliminado del equipo');
    }

    public function evaluate(Request $request){
        $player = Player::find($request->playerId);
        $attribute_types = AttributeType::all();
        $data = compact('player', 'attribute_types');
        return view('admin.players.evaluate-attributes', compact('data'));
    }

    public function evaluateStore(Request $request, $id){
        $player = Player::find($id);
        for($i = 1; $i <= 12; $i++){
            $attribute = Attribute::find($i);
            $conca = 'at'.$i;
            $value = $request->$conca;
            $player->attributes()->attach($attribute, ['value' => $value, 'date' => now()]);
        }
        return back()->with('status','Jugador evaluado');
    }


}

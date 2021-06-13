<?php

namespace App\Http\Controllers\Publics;


use App\Models\Game;
use App\Models\Team;
use App\Models\Player;
use App\Models\Attribute;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AttributeType;

class PlayerController extends Controller
{

    public function getModalCard(Request $request){
        $player = Player::find($request->playerId);
        $attributeTypes = AttributeType::all();
        $data = compact('player', 'attributeTypes');
        return view('teams.card_player', compact('data'));
    }

    public function show($id){
        $player = Player::find($id);
        return $player->getAvgOfAttributeType(1);
        return $player->attributes()->distinct('attribute_id')->latest('date')->get();
    }
}

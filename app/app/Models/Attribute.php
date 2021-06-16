<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Traits\CanGetTableNameStatically;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attribute extends Model
{
    use HasFactory;

    use CanGetTableNameStatically;


    //Relacion 1:N con AttributeType (1: AttributeType || N: Attribute)
    public function attribute_type(){
        return $this->belongsTo(Attribute::class);
    }

    //Relacion N:M con Player
    public function players(){
        return $this->belongsToMany(Player::class)->withPivot('value', 'date');
    }

    //Atributo attribute_type_name
    public function getAttributeTypeNameAttribute(){
        $buscar = $this->attribute_type_id;
        $id = AttributeType::find($buscar);
        $name = $id->name;
        return $name;
    }


    //Devuelve los valores de un atributo y un jugador
    public function getPlayerValuesOfAttribute($playerId){
        $attribute =  $this->players()->wherePivot('player_id', $playerId)->oldest('date')->get();
        return $attribute;
    }


    //Devuelve el valor actual del atributo y el jugador pasandole el player id
    public function getPlayerCurrentValue($playerId){
        $attribute =  $this->players()->wherePivot('player_id', $playerId)->latest('date')->first();
        if($attribute){
            return $attribute->pivot->value;
        }
        else{
            return null;
        }
    }




}

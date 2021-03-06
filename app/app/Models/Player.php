<?php

namespace App\Models;

use DateTime;
use App\Models\People;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Response;
use App\Traits\CanGetTableNameStatically;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Http\Controllers\GenericTableController;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Player extends Model
{
    use HasFactory;

    use CanGetTableNameStatically;


    //Relacion polimórfica con People
    public function person(){
        return $this->morphOne(People::class, 'personable');
    }

    //Relacion N:M con Attribute
    public function attributes(){
        return $this->belongsToMany(Attribute::class)->withPivot('value', 'date');
    }

    //Relacion N:M con Practice
     public function practices(){
        return $this->belongsToMany(Practice::class)->withPivot('presence');
    }

    //Relacion N:M Game-Player
    public function games(){
        return $this->belongsToMany(Game::class)->orderBy('date', 'DESC')->withPivot('points', 'minutes', 'number', 'rebounds', 'assists');
    }


    //Atributo categoría
    public function getCategoryAttribute(){
        $age = $this->person->age;
        if($age > 5 && $age <= 9){
            return 1;
        }
        if($age >= 10 && $age <= 11){
            return 2;
        }
        if($age >= 12 && $age <= 13){
            return 3;
        }
        if($age >= 14 && $age <= 15){
            return 4;
        }
        if($age >= 16 && $age <= 17){
            return 5;
        }
    }

    //Atributo category_name
    public function getCategoryNameAttribute(){
        $buscar = $this->category_id;
        $id = Category::find($buscar);
        $name = $id->name;
        return $name;
    }

    //Numero de partidos jugados
    public function getGamesPlayedAttribute(){
        return count($this->games);
    }

    //Media de puntos
    public function getAvgPointsAttribute(){
        return round($this->games()->get()->avg('pivot.points'),2);
    }

    //Media de rebotes
    public function getAvgReboundsAttribute(){
        return round($this->games()->get()->avg('pivot.rebounds'),2);
    }

    //Media de asistencias
    public function getAvgAssistsAttribute(){
        return round($this->games()->get()->avg('pivot.assists'),2);
    }

    //Media de asistencias
    public function getAvgMinutesAttribute(){
        return round($this->games()->get()->avg('pivot.minutes'),2);
    }

    //Obtiene la media por tipo de attributo
    public function getAvgOfAttributeType($attributeType){
        $attributes = Attribute::all();
        foreach($attributes as $attribute){
            $attributesValue[$attribute->attribute_type_id][] = $attribute->getPlayerCurrentValue($this->id);
        }

        for($i = 1; $i <= 3; $i++){
            $avgAttributeType[$i] = array_sum($attributesValue[$i])/count($attributesValue[$i]);
        }


        return $avgAttributeType[$attributeType];
    }

    //Devuelve los botones a mostrar en el listado
    public static function getButtonList(){
        $buttonList = [
            'create' => true,
            'delete' => false,
            'edit' => true,
            'show' => true
        ];
        if(Auth::user()->role != 1){
            $buttonList['create'] = false;
            $buttonList['edit'] = false;
        }
       return $buttonList;
    }

    //Devuelve los jugadores sin equipo actualmente
    public static function freePlayers(){
        $players = Player::all();

        $freePlayers = [];
        foreach($players as $player){
            if(!$player->person->current_team){
                $freePlayers [] = $player;
            }
        }

        return $freePlayers;
    }



}

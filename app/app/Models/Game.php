<?php

namespace App\Models;

use App\Traits\GenericTable;
use Illuminate\Database\Eloquent\Model;
use App\Traits\CanGetTableNameStatically;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Game extends Model
{
    use HasFactory;

    use CanGetTableNameStatically;

    use GenericTable;

    protected $dates = ['date'];

    public static $title = 'Partidos';

    public static $titleSingular = 'Equipo';

    //Relacion 1:N con Team (1: Team || N: Game)
    public function team(){
        return $this->belongsTo(Team::class);
    }

    //Relacion N:M Game-Player
    public function players(){
        return $this->belongsToMany(Player::class)->withPivot('points', 'minutes', 'number')->orderByPivot('number');
    }

    public function getPointsAttribute(){
        return $this->players->sum('pivot.points');
    }

    //Devuevle una cadena con el resultado del partido
    public function getResultAttribute(){
        if($this->home){
            return $this->points.' - '.$this->opponent_points;
        }
        return $this->opponent_points.' - '.$this->points;
    }


    //Devuevle una cadena con el resultado del partido
    public function getResultWithNamesAttribute(){
        if($this->home){
            return $this->team->name.' '.$this->points.' - '.$this->opponent_points.' '.$this->opponent;
        }
        return $this->opponent.' '.$this->opponent_points.' - '.$this->points.' '.$this->team->name;
    }

    //Devuelve True si victoria, False si derrota
    public function getVictoryAttribute(){
        if($this->points > $this->opponent_points){
            return true;
        }
        return false;
    }

    //Devuelve True si victoria, False si derrota
    public function getBeenPlayedAttribute(){
        if($this->opponent_points != null){
            return false;
        }
        return false;
    }

    //Devuelve True si victoria, False si derrota
    public function getPlaceAttribute(){
        if($this->home){
            return 'Local';
        }
        return 'Visitante';
    }

    //Sobreescribe el método getButtonList de la Tabla Genérica y devuelve la lista de botones disponible en la vista
    public static function getButtonList(){
        $buttonList = [
            'create' => true,
            'delete' => false,
            'edit' => false,
            'show' => false
        ];
       return $buttonList;
    }
}

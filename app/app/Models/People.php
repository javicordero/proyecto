<?php

namespace App\Models;

use App\Traits\GenericTable;
use Illuminate\Database\Eloquent\Model;
use App\Traits\CanGetTableNameStatically;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class People extends Model
{
    use HasFactory;

    use CanGetTableNameStatically;

    use GenericTable;


    public static $title = 'Personas';

    public static $titleSingular = 'Persona';

    //Relacion polimórfica con Player y Coach
    public function personable(){
        return $this->morphTo();
    }

    //Relacion 1:N con Contract (1: People || N: Conctract)
    public function contracts(){
        return $this->hasMany(Contract::class)->latest('date_start');
    }

    //Devuelve el equipo actual de la persona
    public function getCurrentTeamAttribute(){
        return $this->contracts()->latest('date_start')->first()->team;
    }

    //Atributo personable_type_name
    public function getPersonableTypeNameAttribute(){
        return $this->personable_type == Player::class ? 'Jugador' : 'Entrenador';
    }

    //Sobreescribe el método getColumnsForShow de la Tabla Genérica y devuelve las columnas para mostrarlas en la vista
    public static function getColumnsForShow(){
        $columns = self::getColumnsWithoutTimeStamps();
        array_pop($columns);
        array_pop($columns);
        array_pop($columns);
        array_push($columns, 'personable_type_name');
        return $columns;
    }

    //Sobreescribe el método getButtonList de la Tabla Genérica y devuelve la lista de botones disponible en la vista
    public static function getButtonList(){
        $buttonList = [
            'create' => true,
            'delete' => true,
            'edit' => true,
            'show' => true
        ];
       return $buttonList;
    }

    public function getImagePathAttribute(){
        if($this->image){
            //return '/images/people/'.$this->image;
            return $this->image; //De momento para las imagenes del faker
        }
        else{
            return '/images/people/default.jpg';
        }
    }
}

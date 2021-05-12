<?php

namespace App\Models;

use App\Models\People;
use App\Traits\GenericTable;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Traits\CanGetTableNameStatically;
use App\Http\Controllers\GenericTableController;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Player extends Model
{
    use HasFactory;

    use CanGetTableNameStatically;

    use GenericTable;


    public static $title = 'Jugadores';

    public static $titleSingular = 'Jugador';

    //Relacion polimórfica con People
    public function person(){
        return $this->morphOne(People::class, 'personable');
    }

    //Relacion N:M con Attribute
    public function attributes(){
        return $this->belongsToMany(Attribute::class)->withPivot('value', 'date');
    }

    //Sobreescribe el método getAll de la Tabla Genérica y devuelve todos los datos para mostrarlos
    public static function getAll(){
        return DB::table('People')->where('personable_type', Player::class)->join('players', 'players.id', 'people.personable_id')->get();
    }

    //Sobreescribe el método getColumnsForShow de la Tabla Genérica y devuelve las columnas para mostrarlas en la vista
    public static function getColumnsForShow(){
       $columns = self::getColumnsWithoutTimeStamps();
       $peopleColumns = People::getColumnsForShow();
       array_pop($peopleColumns); //Quita el tipo ded persona
       array_shift($columns); //Quita el id para no mostrarlo 2 veces
       $columns = array_merge($peopleColumns, $columns);

       return $columns;
    }




}

<?php

namespace App\Models;

use DateTime;
use App\Models\People;
use App\Traits\GenericTable;
use Illuminate\Support\Facades\DB;
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

    //Relacion N:M con Practice
     public function practices(){
        return $this->belongsToMany(Practice::class)->withPivot('presence');
    }

    //Relacion N:M Game-Player
    public function games(){
        return $this->belongsToMany(Game::class)->orderBy('date', 'DESC')->withPivot('points', 'minutes', 'number');
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

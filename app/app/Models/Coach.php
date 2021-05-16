<?php

namespace App\Models;

use App\Traits\GenericTable;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use App\Traits\CanGetTableNameStatically;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Coach extends Model
{
    use HasFactory;

    use CanGetTableNameStatically;

    use GenericTable;



    public static $title = 'Entrenadores';

    public static $titleSingular = 'Entrenador';

    //Relacion polimórfica con People
    public function person(){
        return $this->morphOne(People::class, 'personable');
    }

    //Sobreescribe el método getAll de la Tabla Genérica y devuelve todos los datos para mostrarlos
    public static function getAll(){
        return DB::table('People')->where('personable_type', Coach::class)->join('coaches', 'coaches.id', 'people.personable_id')->get();
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

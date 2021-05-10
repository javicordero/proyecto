<?php

namespace App\Models;

use App\Traits\GenericTable;
use Illuminate\Database\Eloquent\Model;
use App\Traits\CanGetTableNameStatically;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    //Atributo personable_type_name
    public function getPersonableTypeNameAttribute(){
        return $this->personable_type == Player::class ? 'Jugador' : 'Entrenador';
    }

    //Sobreescribe el método getColumnsForShow de la Tabla Genérica y devuelve las columnas para mostrarlas en la vista
    public static function getColumnsForShow(){
        $columns = self::getColumnsWithoutTimeStamps();
        array_pop($columns);
        array_pop($columns);
        array_push($columns, 'personable_type_name');
        return $columns;
    }

    //Sobreescribe el método getButtonList de la Tabla Genérica y devuelve la lista de botones disponible en la vista
    public static function getButtonList(){
        $buttonList = [
            'create' => false,
            'delete' => true,
            'edit' => false,
            'show' => false
        ];
       return $buttonList;
    }
}

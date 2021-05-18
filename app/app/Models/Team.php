<?php

namespace App\Models;

use App\Traits\GenericTable;
use Illuminate\Database\Eloquent\Model;
use App\Traits\CanGetTableNameStatically;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Team extends Model
{
    use HasFactory;

    use CanGetTableNameStatically;

    use GenericTable;

    public static $title = 'Equipos';

    public static $titleSingular = 'Equipo';

    //Relacion 1:N con Category (1: Category || N: Team)
    public function category(){
        return $this->belongsTo(Category::class);
    }


    //Relacion 1:N con Tean (1: Team || N: Conctract)
    public function contracts(){
        return $this->hasMany(Contract::class);
    }

    //Atributo attribute_type_name
    public function getCategoryNameAttribute(){
        $buscar = $this->category_id;
        $id = Category::find($buscar);
        $name = $id->name;
        return $name;
    }

    //Sobreescribe el método getButtonList de la Tabla Genérica y devuelve la lista de botones disponible en la vista
    public static function getButtonList(){
        $buttonList = [
            'create' => true,
            'delete' => true,
            'edit' => true,
            'show' => false
        ];
       return $buttonList;
    }

    //Devuelve un array para crear un select con los distintos valores de la tabla AttributeType
    public static function getSelectOptions(){
        return Category::pluck('name', 'id')->all();
    }
}

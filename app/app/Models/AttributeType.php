<?php

namespace App\Models;


use App\Traits\GenericTable;
use Illuminate\Database\Eloquent\Model;
use App\Traits\CanGetTableNameStatically;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AttributeType extends Model
{
    use HasFactory;

    use CanGetTableNameStatically;

    use GenericTable;

    public static $title = 'Tipos de atributo';

    public static $titleSingular = 'Tipo de atributo';

    //Relacion 1:N con AttributeType (1: AttributeType || N: Attribute)
    public function attributes(){
        return $this->hasMany(Attribute::class);
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
}

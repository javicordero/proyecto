<?php

namespace App\Models;


use App\Traits\GenericTable;
use Illuminate\Database\Eloquent\Model;
use App\Traits\CanGetTableNameStatically;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attribute extends Model
{
    use HasFactory;

    use CanGetTableNameStatically;

    use GenericTable;

    public static $title = 'Atributos';

    public static $titleSingular = 'Atributo';

    //Relacion 1:N con AttributeType (1: AttributeType || N: Attribute)
    public function attribute_type(){
        return $this->belongsTo(Attribute::class);
    }

    //Atributo attribute_type_name
    public function getAttributeTypeNameAttribute(){
        $buscar = $this->attribute_type_id;
        $id = AttributeType::find($buscar);
        $name = $id->name;
        return $name;
    }

    //Devuelve un array para crear un select con los distintos valores de la tabla AttributeType
    public static function getSelectOptions(){
        return AttributeType::pluck('name', 'id')->all();
    }




}

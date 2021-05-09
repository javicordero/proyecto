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

    public function attribute_type(){
        return $this->belongsTo(Attribute::class);
    }

    public function getAttributeTypeNameAttribute(){
        $buscar = $this->attribute_type_id;
        $id = AttributeType::find($buscar);
        $name = $id->name;
        return $name;
    }

    public static function getSelectOptions(){
        return AttributeType::pluck('name', 'id')->all();
    }




}

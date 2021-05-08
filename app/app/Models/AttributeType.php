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

    public static $spanishColumns = ['Id', 'Nombre'];

    public function attributes(){
        return $this->hasMany(Attribute::class);
    }



}

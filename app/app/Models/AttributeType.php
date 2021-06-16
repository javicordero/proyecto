<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use App\Traits\CanGetTableNameStatically;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AttributeType extends Model
{
    use HasFactory;

    use CanGetTableNameStatically;

    //Relacion 1:N con AttributeType (1: AttributeType || N: Attribute)
    public function attributes(){
        return $this->hasMany(Attribute::class);
    }

}

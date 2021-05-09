<?php

namespace App\Models;

use App\Traits\GenericTable;
use Illuminate\Database\Eloquent\Model;
use App\Traits\CanGetTableNameStatically;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Coach extends People
{
    use HasFactory;

    use CanGetTableNameStatically;

    use GenericTable;

    protected $table = "people";

    public static $title = 'Entrenadores';

    public static function getAll(){
        return People::where('type',2)->get();
    }

    public static function getSelectOptions(){
        return People::getSelectOptions();
    }
}

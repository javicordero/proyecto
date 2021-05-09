<?php

namespace App\Models;

use App\Traits\GenericTable;
use Illuminate\Database\Eloquent\Model;
use App\Traits\CanGetTableNameStatically;
use App\Http\Controllers\GenericTableController;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Player extends People
{
    use HasFactory;

    use CanGetTableNameStatically;

    use GenericTable;

    protected $table = "people";

    public static $title = 'Jugadores';

    public static function getAll(){
        return People::where('type',1)->get();
    }

    public static function getSelectOptions(){
        return People::getSelectOptions();
    }



}

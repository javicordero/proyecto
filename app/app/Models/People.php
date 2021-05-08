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

    public static $spanishColumns = ['Id', 'Nombre', 'Apellidos', 'Teléfono'];
}

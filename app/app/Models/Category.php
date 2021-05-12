<?php

namespace App\Models;

use App\Models\Team;
use App\Traits\GenericTable;
use Illuminate\Database\Eloquent\Model;
use App\Traits\CanGetTableNameStatically;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    use CanGetTableNameStatically;

    use GenericTable;

    public static $title = 'Categorías';

    public static $titleSingular = 'Categoría';


    //Relacion 1:N con Category (1: Category || N: Team)
    public function teams(){
        return $this->hasMany(Team::class);
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

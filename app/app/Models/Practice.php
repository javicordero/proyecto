<?php

namespace App\Models;

use App\Traits\GenericTable;
use Illuminate\Database\Eloquent\Model;
use App\Traits\CanGetTableNameStatically;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Practice extends Model
{
    use CanGetTableNameStatically;

    use GenericTable;

    public static $title = 'Entrenamientos';

    public static $titleSingular = 'Entrenamiento';

    //Relacion N:M con Player
    public function players(){
        return $this->belongsToMany(Player::class)->withPivot('presence');
    }

    //Relacion 1:N con Practice (1: Team || N: Practice)
    public function team(){
        return $this->belongsTo(Team::class);
    }
}

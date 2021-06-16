<?php

namespace App\Models;

use App\Models\Team;
use Illuminate\Database\Eloquent\Model;
use App\Traits\CanGetTableNameStatically;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    use CanGetTableNameStatically;


    //Relacion 1:N con Category (1: Category || N: Team)
    public function teams(){
        return $this->hasMany(Team::class);
    }

}

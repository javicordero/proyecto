<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opponent extends Model
{
    use HasFactory;

     //Relacion 1:N con Game (1: Team || N: Game)
     public function games(){
        return $this->hasMany(Game::class);
    }

    //Atributo image_path
    public function getImagePathAttribute(){
        return '/public-template/images/opponents/'.$this->id.'.png';
   }
}

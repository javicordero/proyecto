<?php

namespace App\Models;

use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\Traits\CanGetTableNameStatically;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class People extends Model
{
    use HasFactory;

    use CanGetTableNameStatically;


    //Relacion polimórfica con Player y Coach
    public function personable(){
        return $this->morphTo();
    }

    //Relacion 1:N con Contract (1: People || N: Conctract)
    public function contracts(){
        return $this->hasMany(Contract::class)->latest('date_start');
    }

    //Relacion 1:1 con User
    public function user(){
        return $this->belongsTo(User::class);
    }

    //Devuelve el equipo actual de la persona
    public function getCurrentContractAttribute(){
        return !empty($this->contracts()->where('date_end', null)->first()) ? $this->contracts()->where('date_end', null)->first() : false;
    }

    //Devuelve el equipo actual de la persona
    public function getCurrentTeamAttribute(){
        return $this->current_contract ? $this->current_contract->team : false;
    }

    //Atributo personable_type_name
    public function getPersonableTypeNameAttribute(){
        return $this->personable_type == Player::class ? 'Jugador' : 'Entrenador';
    }

    //Atributo image_path
    public function getImagePathAttribute(){
        return $this->user->image_path;

    }

    //Devuelve la edad
    public function getAgeAttribute(){
        $birthDate = $this->birth_date;
        $oDateNow = new DateTime();
        $birthDate = new DateTime($birthDate);
        // New interval
        $diff = $oDateNow->diff($birthDate);
        return $diff->y;
    }

    //Nombre completo
    public function getFullNameAttribute(){
        return $this->name.' '.$this->surname;
    }



}

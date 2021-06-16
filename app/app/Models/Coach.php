<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\Traits\CanGetTableNameStatically;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Coach extends Model
{
    use HasFactory;

    use CanGetTableNameStatically;


    //Relacion polimórfica con People
    public function person(){
        return $this->morphOne(People::class, 'personable');
    }

    //Sobreescribe el método getAll de la Tabla Genérica y devuelve todos los datos para mostrarlos
    public static function getAll(){
        return DB::table('People')->where('personable_type', Coach::class)->join('coaches', 'coaches.id', 'people.personable_id')->get();
    }

    public function getCurrentContracts(){
        return $this->person->contracts()->where('date_end', null)->get();
    }

    //Devuelve el equipo actual de la persona
    public function getCurrentTeamsAttribute(){
        $teams = [];
        $contracts = $this->getCurrentContracts();
        foreach($contracts as $contract){
            $teams[] = $contract->team;
        }
        return $teams;
    }

    public static function getButtonList(){
        $buttonList = [
            'create' => true,
            'delete' => false,
            'edit' => true,
            'show' => true
        ];
        if(Auth::user()->role != 1){
            $buttonList['create'] = false;
            $buttonList['edit'] = false;
        }
       return $buttonList;
    }


}

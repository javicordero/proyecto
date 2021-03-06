<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use App\Traits\CanGetTableNameStatically;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Team extends Model
{
    use HasFactory;

    use CanGetTableNameStatically;


    //Relacion 1:N con Category (1: Category || N: Team)
    public function category(){
        return $this->belongsTo(Category::class);
    }

    //Relacion 1:N con Contract (1: Team || N: Conctract)
    public function contracts(){
        return $this->hasMany(Contract::class);
    }


    //Relacion 1:N con Game (1: Team || N: Game)
    public function games(){
        return $this->hasMany(Game::class);
    }

    //Relacion 1:N con TeampracticeDay (1: Team || N: TeampracticeDay)
    public function practiceDays(){
        return $this->hasMany(TeamPracticeDay::class)->orderBy('day');
    }

    //Atributo category_name
    public function getCategoryNameAttribute(){
        $buscar = $this->category_id;
        $id = Category::find($buscar);
        $name = $id->name;
        return $name;
    }

    //Atributo name
    public function getNameAttribute(){
        return $this->category->name.' '.$this->gender.' '.$this->nickname;
    }

    //Attributo nombre corto
    public function getShortNameAttribute(){
        return substr($this->category->name, 0, 3).' '.substr($this->gender, 0, 3). ' '.$this->nickname;
    }


    //Próximo partido
    public function getNextGameAttribute(){
        return $this->games()->where('played', false)->orderBy('date', 'ASC')->first();
    }

    //Atributo image_path
    public function getImagePathAttribute(){
        return '/images/teams/'.$this->id.'.jpg';

        //return $this->image;
       if($this->image){
       }
       else{
        return '/images/team-5.jpg';
       }
   }

    //Atributo image_path
    public function getLogoImagePathAttribute(){
        return '/images/teamLogo.png';
    }


    //Devuelve los contratos que estan actualmente en el equipo
    public function getCurrentContracts(){
        $contracts =  $this->contracts()->where('date_end', null)->get();
        return $contracts;
    }


    //Devuelve los jugadores actuales del equipo
    public function getCurrentPlayers(){
        $players = [];
        $contracts = $this->getCurrentContracts();
        foreach($contracts as $contract){
            $person = People::find($contract->people_id);
            if($person->personable_type == 'App\\Models\\Player'){
                $players[] = $person;
            }
        }
        return $players;
    }

    //Devuelve los jugadores actuales del equipo
    public function getCurrentCoachAttribute(){
        $coach = null;
        $contracts = $this->getCurrentContracts();
        foreach($contracts as $contract){
            $person = People::find($contract->people_id);
            if($person->personable_type == 'App\\Models\\Coach'){
                $coach = $person;
            }
        }
        return $coach;
    }


    //Devuelve los jugadores de una categoría inferior
    public function getListablePlayersFromOtherCategory(){
        $players = Player::all();
        $returnPlayers = [];
        foreach($players as $player){
            if($player->category == $this->category->id - 1 && $player->person->gender == $this->gender){
                $returnPlayers[] = $player;
            }
        }
        return $returnPlayers;
    }

    //Sobreescribe el método getButtonList de la Tabla Genérica y devuelve la lista de botones disponible en la vista
    public static function getButtonList(){
        if(Auth::user()->role == 1){
            $buttonList = [
                'create' => true,
                'delete' => true,
                'edit' => true,
                'show' => true
            ];
        }
        else{
            $buttonList = [
                'create' => false,
                'delete' => false,
                'edit' => false,
                'show' => true
            ];
        }


       return $buttonList;
    }

}

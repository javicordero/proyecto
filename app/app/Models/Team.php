<?php

namespace App\Models;

use App\Traits\GenericTable;
use Illuminate\Database\Eloquent\Model;
use App\Traits\CanGetTableNameStatically;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Team extends Model
{
    use HasFactory;

    use CanGetTableNameStatically;

    use GenericTable;

    public static $title = 'Equipos';

    public static $titleSingular = 'Equipo';

    //Relacion 1:N con Category (1: Category || N: Team)
    public function category(){
        return $this->belongsTo(Category::class);
    }

    //Relacion 1:N con Contract (1: Team || N: Conctract)
    public function contracts(){
        return $this->hasMany(Contract::class);
    }

    //Relacion 1:N con Practice (1: Team || N: Practice)
    public function practices(){
        return $this->hasMany(Practice::class);
    }

    //Relacion 1:N con Game (1: Team || N: Game)
    public function ganmes(){
        return $this->hasMany(Team::class);
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



    //Devuelve los contratos que estan actualmente en el equipo
    public function getCurrentContracts(){
        $contracts =  $this->contracts()->where('date_end', null)->get();
        return $contracts;
    }


    //Devuelve los jugadores actuales del equipo
    public function getCurrentPlayers(){
        $contracts = $this->getCurrentContracts();
        foreach($contracts as $contract){
            $person = People::find($contract->people_id);
            if($person->personable_type == 'App\\Models\\Player'){
                $players[] = $person;
            }

        }
        return $players;
    }


    //Sobreescribe el método getButtonList de la Tabla Genérica y devuelve la lista de botones disponible en la vista
    public static function getButtonList(){
        $buttonList = [
            'create' => true,
            'delete' => true,
            'edit' => true,
            'show' => true
        ];
       return $buttonList;
    }

    //Devuelve un array para crear un select con los distintos valores de la tabla AttributeType
    public static function getSelectOptions(){
        return Category::pluck('name', 'id')->all();
    }

    //Sobreescribe el método getColumnsForShow de la Tabla Genérica y devuelve las columnas para mostrarlas en la vista
    public static function getColumnsForShow(){
        $columns = ['id','name'];
        return $columns;
    }
}

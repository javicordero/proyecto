<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use App\Models\People;
use App\Models\Player;
use App\Models\Contract;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    public function index(){
        return People::index();
    }

    public function destroy($id){
        $person = People::find($id);
        $person->personable->delete();
        $person->delete();

        $tipoPersona = $person->personable_type_name;
        return back()->with('status', $tipoPersona.' eliminado');
    }

    public static function store($request, $playerOrCoach){
        $person = new People();
        $person->name = $request->name;
        $person->surname = $request->surname;
        $person->phone = $request->phone;
        $person->birth_date = $request->birthDate;
        $person->gender = $request->gender;

        $playerOrCoach->person()->save($person);

        $tipoPersona = $person->personable_type_name;
        return back()->with('status', $tipoPersona.' guardado');
    }

    public static function update($request, $id){
        $person = People::find($id);
        $person->name = $request->name;
        $person->surname = $request->surname;
        $person->phone = $request->phone;
        $person->birth_date = $request->birthDate;
        $person->gender = $request->gender;
        $person->update();

        $tipoPersona = $person->personable_type_name;
        return back()->with('status', $tipoPersona.' actualizado');
    }


    public function updateImage(Request $request){

        if($request->personType == 'players'){
            $playerOrCoach = Player::find($request->id);
        }
        elseif($request->personType == 'coaches'){
            $playerOrCoach = Coach::find($request->id);
        }

        $person = $playerOrCoach->person;
        //IMAGE
        if($request->fileToUpload){

            //GUARDA LA IMAGEN EN DISCO Y LE ASIGNA DE NOMBRE EL ID DE LA PERSONA
            $path = public_path().'/images/people/';
            $image = $request->fileToUpload;
            $image_name = $person->id.'.jpg';
            $image->move($path,$image_name);

            //GUARDA LA FILA EN LA BASE DE DATOS
            $person->image = $image_name;
        }

        $person->update();

        return 'Imagen subida';
    }

    public function movePerson(Request $request, $id){
        $person = People::find($id);

        //Cierra el contrato actual
        $currentContract = $person->current_contract;
        $currentContract->date_end = now();
        $currentContract->save();

        //Crea uno nuevo
        $contract = new Contract();
        $contract->team_id = $request->team;
            $contract->people_id = $person->id;
            $contract->date_start = now();
            $contract->date_end = null;
            $contract->save();

        $tipoPersona = $person->personable_type_name;
        return back()->with('status', $tipoPersona.' movido de equipo');
    }
}

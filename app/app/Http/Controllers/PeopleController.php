<?php

namespace App\Http\Controllers;

use App\Models\People;
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

    public static function update($request, $id){
        $person = People::find($id);
        $person->name = $request->name;
        $person->surname = $request->surname;
        $person->phone = $request->phone;
        $person->save();

        $tipoPersona = $person->personable_type_name;
        return back()->with('status', $tipoPersona.' actualizado');
    }

    public static function store($request, $playerOrCoach){
        $person = new People();
        $person->name = $request->name;
        $person->surname = $request->surname;
        $person->phone = $request->phone;

        $playerOrCoach->person()->save($person);

        $tipoPersona = $person->personable_type_name;
        return back()->with('status', $tipoPersona.' guardado');
    }
}

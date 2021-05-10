<?php

namespace App\Http\Controllers;

use App\Models\People;
use Illuminate\Http\Request;

class PeopleController extends Controller
{
    public function index(){
        $data = People::getData();
        return view('people.index', compact('data'));
    }

    public function destroy($id){
        $person = People::find($id);
        $person->personable->delete();
        $person->delete();

        return back();
    }

    public static function update($request, $id){
        $person = People::find($id);
        $person->name = $request->name;
        $person->surname = $request->surname;
        $person->phone = $request->phone;
        $person->save();
        return back();
    }

    public static function store($request, $playerOrCoach){
        $person = new People();
        $person->name = $request->name;
        $person->surname = $request->surname;
        $person->phone = $request->phone;

        $playerOrCoach->person()->save($person);

        return back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use App\Models\People;
use App\Models\Player;
use Illuminate\Http\Request;
use App\Models\AttributeType;
use Illuminate\Support\Facades\Auth;

class CoachController extends Controller
{
    public function index(){
        return Coach::index();
    }

    public function destroy($id){
        $coach = Coach::find($id);
        $coach->delete();
        $coach->person->delete();

        return back()->with('status', 'Entrenador eliminado');
    }

    public function create(){
        return view('admin.coaches.create');
    }

    public function store(Request $request){
        $coach = new Coach();
        $coach->license = $request->license;
        $coach->save();

        return PeopleController::store($request, $coach);
    }

    public function edit(Request $request){
        $coach = Coach::find($request->attributeId);
        $data = compact('coach');
        return view('admin.coaches.edit', compact('data'));
    }

    public static function update(Request $request, $id){
        $coach = Coach::find($id);
        $coach->license = $request->license;
        $coach->save();
        $person = $coach->person;

        return PeopleController::update($request, $person->id);
    }



    public function show($id){
        $coach = Coach::find($id);
        $person = $coach->person;
        $data = compact('person');

        return view('admin.people.profile', compact('data'));
    }
}

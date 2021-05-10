<?php

namespace App\Http\Controllers;

use App\Models\Coach;
use App\Models\People;
use Illuminate\Http\Request;

class CoachController extends Controller
{
    public function index(){
        return Coach::index();
    }

    public function destroy($id){
        $coach = Coach::find($id);
        $coach->delete();
        $coach->person->delete();

        return back();
    }

    public static function update(Request $request, $id){
        $coach = Coach::find($id);
        $coach->license = $request->license;
        $coach->save();

        $person = $coach->person;
        return PeopleController::update($request, $person->id);
    }

    public function store(Request $request){
        $coach = new Coach();
        $coach->license = $request->license;
        $coach->save();

        return PeopleController::store($request, $coach);
    }
}

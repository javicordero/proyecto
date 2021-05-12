<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index(){
        return Team::index();
    }

    public function destroy($id){
        return Team::deleteGeneric($id);
    }

    public function update(Request $request, $id){
        return Team::updateGeneric($request, $id);
    }

    public function store(Request $request){
        return Team::storeGeneric($request);
    }

}

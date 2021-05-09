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
        return People::deleteGeneric($id);
    }

    public function update(Request $request, $id){
        return People::updateGeneric($request, $id);
    }

    public function store(Request $request){
        return People::storeGeneric($request);
    }
}

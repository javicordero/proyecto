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
}

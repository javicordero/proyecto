<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use Illuminate\Http\Request;

class AttributeController extends Controller
{

    public function index(){
        return Attribute::index();
    }

    public function destroy($id){
        return Attribute::deleteGeneric($id);
    }

    public function update(Request $request, $id){
        return Attribute::updateGeneric($request, $id);
    }

    public function store(Request $request){
        return Attribute::storeGeneric($request);
    }
}

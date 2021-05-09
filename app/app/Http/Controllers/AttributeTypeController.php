<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AttributeType;
use Illuminate\Support\Facades\Schema;

class AttributeTypeController extends Controller
{
    public function index(){
        return AttributeType::index();
    }

    public function destroy($id){
        return AttributeType::deleteGeneric($id);
    }

    public function update(Request $request, $id){
        return AttributeType::updateGeneric($request, $id);
    }

    public function store(Request $request){
        return AttributeType::storeGeneric($request);
    }
}

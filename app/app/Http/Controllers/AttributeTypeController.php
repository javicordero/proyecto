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

    public function create(){
        return view('attribute_types.create');
    }

    public function store(Request $request){
        $attributeType = new AttributeType();
        $attributeType->name = $request->name;
        $attributeType->save();
        return back()->with('status', 'Tipo de atributo guardado');
    }

    public function edit(Request $request){
        $attributeType = AttributeType::find($request->attributeId);
        $data = compact('attributeType');
        return view('attribute_types.edit', compact('data'));
    }

    public function update(Request $request, $id){
        $attributeType = AttributeType::find($id);
        $attributeType->name = $request->name;
        $attributeType->save();
        return back()->with('status', 'Tipo de atributo actualizado');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Models\Attribute;
use Illuminate\Http\Request;
use App\Models\AttributeType;

class AttributeController extends Controller
{

    public function index(){
        return Attribute::index();
    }

    public function destroy($id){
        return Attribute::deleteGeneric($id);
    }

    public function create(){
        $attributeTypes = AttributeType::pluck('name', 'id')->all();
        $data = compact('attributeTypes');
        return view('attributes.create', compact('data'));
    }

    public function store(Request $request){
        $attribute = new Attribute();
        $attribute->name = $request->name;
        $attribute->attribute_type_id = $request->attributeType;
        $attribute->save();

        $players = Player::all();
        foreach($players as $player){
            $attribute->players()->save($player);
        }
        return back()->with('status', 'Atributo guardado');
    }

    public function edit(Request $request){
        $attribute = Attribute::find($request->attributeId);
        $attributeTypes = AttributeType::pluck('name', 'id')->all();
        $data = compact('attribute', 'attributeTypes');
        return view('attributes.edit', compact('data'));
    }

    public function update(Request $request, $id){
        $attribute = Attribute::find($id);
        $attribute->name = $request->name;
        $attribute->attribute_type_id = $request->attributeType;
        $attribute->update();
        return back()->with('status', 'Atributo actualizado');
    }
}

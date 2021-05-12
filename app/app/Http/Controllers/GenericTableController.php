<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GenericTableController extends Controller
{
    public function edit(Request $request){
        $data = $request->clase::getData();
        $data['attribute'] = $request->clase::find($request->attributeId);
        return view('generic_table.edit', compact('data'));
    }

    public function create(Request $request){
        $data = $request->clase::getData();
        return view('generic_table.create', compact('data'));
    }
}

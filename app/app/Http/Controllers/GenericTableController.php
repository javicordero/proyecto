<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use Illuminate\Http\Request;
use App\Models\AttributeType;
use Illuminate\Routing\Controller;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;

class GenericTableController extends Controller
{
    public static function index($importedData, $all){

        $title = $importedData['title'];
        $class = $importedData['class'];
        $columns = $importedData['columns'];
        $tableName = $importedData['tableName'];
        $selectOptions = $importedData['selectOptions'];
        $data = compact('all', 'columns', 'title', 'class' ,'tableName', 'selectOptions');

        return view('generic_table.index', compact('data'));
    }

    public static function deleteGeneric($importedData){
        $attribute = $importedData['class']::find($importedData['id']);
        $attribute->delete();
        return redirect()->route($importedData['tableName'].'.index')->with('status', 'Post Eliminado');
    }

    public static function updateGeneric($request, $importedData){
        $table = $importedData['class']::find($importedData['id']);
        foreach ($importedData['columns'] as $column){
            $table->$column = $request->$column;
        }
        $table->save();

        return back()->with('status', 'Post Eliminado');
    }

    public static function storeGeneric($request, $importedData){
        $table = new $importedData['class'];
        foreach ($importedData['columns'] as $column){
            $table->$column = $request->$column;

        }
        $table->save();

        return back()->with('status', 'Post Eliminado');
    }


}

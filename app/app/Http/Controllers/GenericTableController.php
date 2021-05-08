<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use Illuminate\Http\Request;
use App\Models\AttributeType;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class GenericTableController extends Controller
{
    public static function index($importedData){

        $all = $importedData['class']::all();

        $columns = DB::getSchemaBuilder()->getColumnListing($importedData['tableName']);
        $columns = array_diff($columns, array('created_at', 'updated_at')); //ELimina las columnas created_at y updated_at para no mostrarlas

        $title = $importedData['title'];
        $spanishColumns = $importedData['spanishColumns'];

        $tableName = $importedData['tableName'];

        foreach($columns as $column){
            //echo $column.'-';
            if(substr($column, -3) == '_id'){
                $columns = array_diff($columns, array($column));
                $column = substr($column, 0,-3).'_name';
                array_push($columns, $column);
            }
        }

        $data = compact('all', 'columns', 'title', 'spanishColumns', 'tableName');

        return view('generic_table.index', compact('data'));
    }

    public static function deleteGeneric($importedData){
        $attribute = $importedData['class']::find($importedData['id']);
        $attribute->delete();
        return redirect()->route($importedData['tableName'].'.index')->with('status', 'Post Eliminado');
    }


}

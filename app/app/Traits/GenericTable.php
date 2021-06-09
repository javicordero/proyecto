<?php
namespace App\Traits;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\GenericTableController;

trait GenericTable
{

    //Devuelve la vista index de la tabla correspondiente
    public static function index(){
        $data = self::getData();
        return view('admin.generic_table.index', compact('data'));
    }

    //Devuevle todos los datos de la tabla
    public static function getData(){
        $tableName = self::TableName();
        $class = self::class;
        $title = self::getTitle();
        $columns = self::getColumnsForShow();
        $all = self::getAll();
        $titleSingular = self::$titleSingular;
        $buttonList = self::getButtonList();
        return compact('tableName', 'class', 'title', 'columns', 'all', 'titleSingular', 'buttonList');
    }

    //Devuelve todos los datos de la tabla
    public static function getAll(){
        return self::all();
    }

    //Devuelve las columnas de la tabla si lons timestamps
    public static function getColumnsWithoutTimeStamps(){
        $columns = DB::getSchemaBuilder()->getColumnListing(self::tableName());
        $columns = array_diff($columns, array('created_at', 'updated_at')); //ELimina las columnas created_at y updated_at para no mostrarlas
        return $columns;
    }

    //Devuelve las columnas de la tabla, modificando las claves ajenas para mostrar el atributo correspondiente
    public static function getColumnsForShow(){
        $columns = self::getColumnsWithoutTimeStamps();

        foreach($columns as $column){
            //Si la columna acaba en id o en type cambia el nombre de la namespace App\Traits;misma para recoger el nombre del id o el tipo en lugar del numero
            if(substr($column, -3) == '_id'){
                $columns = array_diff($columns, array($column));
                $columnaEditada = substr($column, 0,-3).'_name';
                array_push($columns, [$column => $columnaEditada]);
            }
        }
        return $columns;
    }

    //Devuelve el titulo de la tabla
    public static function getTitle(){
        return self::$title;
    }

    //Elimina el campo de la tabla correspondiente
    public static function deleteGeneric($id){
        $data = self::getData();
        $data['id'] = $id;
        $attribute = $data['class']::find($data['id']);
        $attribute->delete();
        return back()->with('status', $data['titleSingular'].' eliminado');
    }


    //Devuelve la lista de botones disponible en la vista
    public static function getButtonList(){
        $buttonList = [
            'create' => true,
            'delete' => true,
            'edit' => true,
            'show' => true
        ];
        if(Auth::user()->role != 1){
            $buttonList['delete'] = false;
            $buttonList['edit'] = false;
        }
        return $buttonList;
    }



}

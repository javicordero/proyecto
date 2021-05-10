<?php
namespace App\Traits;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\GenericTableController;

trait GenericTable
{

    //Devuelve la vista index de la tabla correspondiente
    public static function index(){
        $data = self::getData();
        return view('generic_table.index', compact('data'));
    }

    //Devuevle todos los datos de la tabla
    public static function getData(){
        $tableName = self::TableName();
        $class = self::class;
        $title = self::getTitle();
        $columns = self::getColumnsForShow();
        $selectOptions = self::getSelectOptions();
        $all = self::getAll();
        $titleSingular = self::$titleSingular;
        return compact('tableName', 'class', 'title', 'columns', 'selectOptions', 'all', 'titleSingular');
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

    //Se debe sobreescribir en las clases que lo necesiten para obtener un array para crear un select
    public static function getSelectOptions(){
        return null;
    }

    //Elimina el campo de la tabla correspondiente
    public static function deleteGeneric($id){
        $data = self::getData();
        $data['id'] = $id;
        $attribute = $data['class']::find($data['id']);
        $attribute->delete();
        return back()->with('status', $data['titleSingular'].' eliminado');
    }

     //Guarda el campo de la tabla correspondiente
     public static function storeGeneric($request){
        $data = self::getData();
        $data['columns'] = self::getColumnsWithoutTimeStamps();

        $table = new $data['class'];
        foreach ($data['columns'] as $column){
            $table->$column = $request->$column;

        }
        $table->save();

        return back()->with('status', $data['titleSingular'].' guardado');
    }

    //Actualiza el campo de la tabla correspondiente
    public static function updateGeneric($request, $id){
        $data = self::getData();
        $data['id'] = $id;
        $data['columns'] = self::getColumnsWithoutTimeStamps();

        $table = $data['class']::find($data['id']);
        foreach ($data['columns'] as $column){
            $table->$column = $request->$column;
        }
        $table->save();

        return back()->with('status', $data['titleSingular'].' actualizado');
    }

}

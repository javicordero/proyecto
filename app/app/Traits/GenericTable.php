<?php
namespace App\Traits;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\GenericTableController;

trait GenericTable
{

    public static function index(){
        $data = self::getData();
        $all = self::getAll();

        return GenericTableController::index($data, $all);
    }

    public static function getAll(){
        return self::all();
    }

    public static function getColumns(){
        $columns = DB::getSchemaBuilder()->getColumnListing(self::tableName());
        $columns = array_diff($columns, array('created_at', 'updated_at')); //ELimina las columnas created_at y updated_at para no mostrarlas
        return $columns;
    }

    public static function getColumnsForShow(){
        $columns = self::getColumns();

        foreach($columns as $column){
            //Si la columna acaba en id o en type cambia el nombre de la misma para recoger el nombre del id o el tipo en lugar del numero
            if(substr($column, -3) == '_id'){
                $columns = array_diff($columns, array($column));
                $columnaEditada = substr($column, 0,-3).'_name';
                array_push($columns, [$column => $columnaEditada]);
            }


            if(substr($column, -4) == 'type'){
                $columns = array_diff($columns, array($column));
                $columnaEditada = $column.'_name';
                array_push($columns, [$column => $columnaEditada]);
            }
        }

        return $columns;
    }

    public static function getData(){
        $tableName = self::tableName();
        $class = self::class;
        $title = self::getTitle();
        $columns = self::getColumnsForShow();
        $selectOptions = self::getSelectOptions();
        return compact('tableName', 'class', 'title', 'columns', 'selectOptions');
    }

    public static function deleteGeneric($id){
        $data = self::getData();
        $data['id'] = $id;
        return GenericTableController::deleteGeneric($data);
    }

    public static function getTitle(){
        return static::$title;
    }

    public static function getSelectOptions(){
        return null;
    }

    public static function updateGeneric($request, $id){
        $data = self::getData();
        $data['id'] = $id;
        $data['columns'] = self::getColumns();
        return GenericTableController::updateGeneric($request, $data);
    }

    public static function storeGeneric($request){
        $data = self::getData();
        $data['columns'] = self::getColumns();
        return GenericTableController::storeGeneric($request, $data);
    }







}

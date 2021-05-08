<?php
namespace App\Traits;

use App\Http\Controllers\GenericTableController;

trait GenericTable
{

    public static function index(){
        $data = self::getData();
        return GenericTableController::index($data);
    }

    public static function getData(){
        $tableName = self::tableName();
        $class = self::class;
        $title = self::getTitle();
        $spanishColumns = self::getSpanishColumns();
        $data = compact('tableName', 'class', 'title', 'spanishColumns');
        return $data;
    }

    public static function deleteGeneric($id){
        $data = self::getData();
        $data['id'] = $id;
        //$data[] = ['id' => $id];
        return GenericTableController::deleteGeneric($data);
    }

    public static function getTitle(){
        return static::$title;
    }

    public static function getSpanishColumns(){
        return static::$spanishColumns;
    }
}

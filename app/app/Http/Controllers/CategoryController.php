<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        return Category::index();
    }

    public function destroy($id){
        return Category::deleteGeneric($id);
    }

    public function update(Request $request, $id){
        return Category::updateGeneric($request, $id);
    }

    public function store(Request $request){
        return Category::storeGeneric($request);
    }

}

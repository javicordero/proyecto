<?php

use App\Http\Controllers\AttributeController;
use App\Http\Controllers\AttributeTypeController;
use App\Http\Controllers\PeopleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function(){
    return view('welcome');
})->name('index');


Route::delete('attributes/{id}',[AttributeController::class, 'destroy'])->name('attributes.destroy');
Route::get('attributes', [AttributeController::class, 'index'])->name('attributes.index');

Route::delete('attribute/types/{id}',[AttributeTypeController::class, 'destroy'])->name('attribute_types.destroy');
Route::get('attribute/types', [AttributeTypeController::class, 'index'])->name('attribute_types.index');


Route::delete('people/{id}',[PeopleController::class, 'destroy'])->name('people.destroy');
Route::get('people', [PeopleController::class, 'index'])->name('people.index');

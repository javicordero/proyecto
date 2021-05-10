<?php

use App\Http\Controllers\AttributeController;
use App\Http\Controllers\AttributeTypeController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\PlayerController;
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


//ATTRIBUTE-TYPES
Route::delete('attributes/{id}',[AttributeController::class, 'destroy'])->name('attributes.destroy');
Route::put('attributes/{id}/update', [AttributeController::class, 'update'])->name('attributes.update');
Route::get('attributes', [AttributeController::class, 'index'])->name('attributes.index');
Route::post('attributes/store', [AttributeController::class, 'store'])->name('attributes.store');


//ATTRIBUTES
Route::delete('attribute/types/{id}',[AttributeTypeController::class, 'destroy'])->name('attribute_types.destroy');
Route::put('attributes/types/{id}/update', [AttributeTypeController::class, 'update'])->name('attribute_types.update');
Route::get('attribute/types', [AttributeTypeController::class, 'index'])->name('attribute_types.index');
Route::post('attribute/types/store', [AttributeTypeController::class, 'store'])->name('attribute_types.store');


//PEOPLE
Route::get('people/{id}', [PeopleController::class, 'show'])->name('people.show'); //ELIMINAR ??
Route::delete('people/{id}',[PeopleController::class, 'destroy'])->name('people.destroy');
Route::put('people/{id}/update', [PeopleController::class, 'update'])->name('people.update');
Route::get('people', [PeopleController::class, 'index'])->name('people.index');
Route::post('people/store', [PeopleController::class, 'store'])->name('people.store');


//PLAYERS
Route::get('players/{id}', [PlayerController::class, 'show'])->name('players.show');
Route::put('players/{id}/update', [PlayerController::class, 'update'])->name('players.update');
Route::delete('players/{id}',[PlayerController::class, 'destroy'])->name('players.destroy');
Route::post('players/store', [PlayerController::class, 'store'])->name('players.store');
Route::get('players', [PlayerController::class, 'index'])->name('players.index');

//COACHES
Route::get('coaches/{id}', [CoachController::class, 'show'])->name('coaches.show');
Route::get('coaches', [CoachController::class, 'index'])->name('coaches.index');
Route::put('coaches/{id}/update', [CoachController::class, 'update'])->name('coaches.update');
Route::delete('coaches/{id}',[CoachController::class, 'destroy'])->name('coaches.destroy');
Route::post('coaches/store', [CoachController::class, 'store'])->name('coaches.store');

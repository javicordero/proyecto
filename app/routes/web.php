<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\AttributeTypeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GenericTableController;
use App\Http\Controllers\TeamController;

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
Route::put('attributes/{id}/update', [AttributeController::class, 'update'])->name('attributes.update');
Route::delete('attributes/{id}',[AttributeController::class, 'destroy'])->name('attributes.destroy');
Route::post('attributes/store', [AttributeController::class, 'store'])->name('attributes.store');
Route::get('attributes', [AttributeController::class, 'index'])->name('attributes.index');


//ATTRIBUTES
Route::put('attributes/types/{id}/update', [AttributeTypeController::class, 'update'])->name('attribute_types.update');
Route::delete('attribute/types/{id}',[AttributeTypeController::class, 'destroy'])->name('attribute_types.destroy');
Route::post('attribute/types/store', [AttributeTypeController::class, 'store'])->name('attribute_types.store');
Route::get('attribute/types', [AttributeTypeController::class, 'index'])->name('attribute_types.index');



//PEOPLE
Route::put('people/{id}/update', [PeopleController::class, 'update'])->name('people.update');
Route::delete('people/{id}',[PeopleController::class, 'destroy'])->name('people.destroy');
Route::post('people/store', [PeopleController::class, 'store'])->name('people.store');
Route::post('people/update-image', [PeopleController::class, 'updateImage'])->name('people.uptade_image');
Route::get('people', [PeopleController::class, 'index'])->name('people.index');



//PLAYERS
Route::put('players/{id}/update', [PlayerController::class, 'update'])->name('players.update');
Route::delete('players/{id}',[PlayerController::class, 'destroy'])->name('players.destroy');
Route::post('players/store', [PlayerController::class, 'store'])->name('players.store');
Route::get('players/{id}', [PlayerController::class, 'show'])->name('players.show');
Route::get('players', [PlayerController::class, 'index'])->name('players.index');
Route::post('players/getPlayerValuesOfAttribute', [PlayerController::class, 'getPlayerValuesOfAttribute'])->name('players.getPlayerValuesOfAttribute');
Route::post('players/getDataForPlayersCreateAttributes', [PlayerController::class, 'getDataForPlayersCreateAttributes'])->name('players.getDataForPlayersCreateAttributes');

//COACHES
Route::put('coaches/{id}/update', [CoachController::class, 'update'])->name('coaches.update');
Route::delete('coaches/{id}',[CoachController::class, 'destroy'])->name('coaches.destroy');
Route::post('coaches/store', [CoachController::class, 'store'])->name('coaches.store');
Route::get('coaches/{id}', [CoachController::class, 'show'])->name('coaches.show');
Route::get('coaches', [CoachController::class, 'index'])->name('coaches.index');

//TEAMS
Route::put('teams/{id}/update', [TeamController::class, 'update'])->name('teams.update');
Route::delete('teams/{id}',[TeamController::class, 'destroy'])->name('teams.destroy');
Route::post('teams/store', [TeamController::class, 'store'])->name('teams.store');
Route::get('teams', [TeamController::class, 'index'])->name('teams.index');

//CATEGORIES
Route::put('categories/{id}/update', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('categories/{id}',[CategoryController::class, 'destroy'])->name('categories.destroy');
Route::post('categories/store', [CategoryController::class, 'store'])->name('categories.store');
Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');

//GENERIC TABLE
Route::post('/table/getDataForEditModal', [GenericTableController::class, 'edit'])->name('genericTable.edit');
Route::post('/table/getDataForCreateModal', [GenericTableController::class, 'create'])->name('genericTable.create');

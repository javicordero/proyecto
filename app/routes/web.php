<?php


use App\Models\Team;
use App\Models\Player;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\CoachController;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AttributeController;
use App\Http\Controllers\GenericTableController;
use App\Http\Controllers\AttributeTypeController;

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
    $player = Player::find(2);

  //  return $player->category;
  //  return $player->person->birth_date.' --->'. $player->category;

  //  return $team.$player->person;

    return view('welcome');
})->name('index');


//ATTRIBUTE-TYPES
Route::put('attributes/{id}/update', [AttributeController::class, 'update'])->name('attributes.update');
Route::delete('attributes/{id}',[AttributeController::class, 'destroy'])->name('attributes.destroy');
Route::post('attributes/store', [AttributeController::class, 'store'])->name('attributes.store');
Route::get('attributes', [AttributeController::class, 'index'])->name('attributes.index');
Route::post('attributes/create', [AttributeController::class, 'create'])->name('attributes.create');
Route::post('attributes/edit', [AttributeController::class, 'edit'])->name('attributes.edit');

//ATTRIBUTES
Route::put('attribute_types/{id}/update', [AttributeTypeController::class, 'update'])->name('attribute_types.update');
Route::delete('attribute_types/{id}',[AttributeTypeController::class, 'destroy'])->name('attribute_types.destroy');
Route::post('attribute_types/store', [AttributeTypeController::class, 'store'])->name('attribute_types.store');
Route::get('attribute_types', [AttributeTypeController::class, 'index'])->name('attribute_types.index');
Route::post('attribute_types/create', [AttributeTypeController::class, 'create'])->name('attribute_types.create');
Route::post('attribute_types/edit', [AttributeTypeController::class, 'edit'])->name('attribute_types.edit');


//PEOPLE
Route::put('people/{id}/update', [PeopleController::class, 'update'])->name('people.update');
Route::delete('people/{id}',[PeopleController::class, 'destroy'])->name('people.destroy');
Route::post('people/store', [PeopleController::class, 'store'])->name('people.store');
Route::post('people/update-image', [PeopleController::class, 'updateImage'])->name('people.uptade_image');
Route::get('people', [PeopleController::class, 'index'])->name('people.index');
Route::post('people/movePerson/{id}', [PeopleController::class, 'movePerson'])->name('people.movePerson');


//PLAYERS
Route::put('players/{id}/update', [PlayerController::class, 'update'])->name('players.update');
Route::delete('players/{id}',[PlayerController::class, 'destroy'])->name('players.destroy');
Route::post('players/store', [PlayerController::class, 'store'])->name('players.store');
Route::get('players/{id}', [PlayerController::class, 'show'])->name('players.show');
Route::get('players', [PlayerController::class, 'index'])->name('players.index');
Route::post('players/getPlayerValuesOfAttribute', [PlayerController::class, 'getPlayerValuesOfAttribute'])->name('players.getPlayerValuesOfAttribute');
Route::post('players/getDataForPlayersCreateAttributes', [PlayerController::class, 'getDataForPlayersCreateAttributes'])->name('players.getDataForPlayersCreateAttributes');
Route::post('players/removePlayer/{id}', [PlayerController::class, 'removeFromTeam'])->name('players.removeFromTeam');
Route::post('players/create', [PlayerController::class, 'create'])->name('players.create');
Route::post('players/edit', [PlayerController::class, 'edit'])->name('players.edit');

//COACHES
Route::put('coaches/{id}/update', [CoachController::class, 'update'])->name('coaches.update');
Route::delete('coaches/{id}',[CoachController::class, 'destroy'])->name('coaches.destroy');
Route::post('coaches/store', [CoachController::class, 'store'])->name('coaches.store');
Route::get('coaches/{id}', [CoachController::class, 'show'])->name('coaches.show');
Route::get('coaches', [CoachController::class, 'index'])->name('coaches.index');
Route::post('coaches/create', [CoachController::class, 'create'])->name('coaches.create');
Route::post('coaches/edit', [CoachController::class, 'edit'])->name('coaches.edit');


//TEAMS
Route::put('teams/{id}/update', [TeamController::class, 'update'])->name('teams.update');
Route::delete('teams/{id}',[TeamController::class, 'destroy'])->name('teams.destroy');
Route::post('teams/store', [TeamController::class, 'store'])->name('teams.store');
Route::get('teams/{id}', [TeamController::class, 'show'])->name('teams.show');
Route::get('teams', [TeamController::class, 'index'])->name('teams.index');
Route::post('teams/getViewForPracticesModal', [TeamController::class, 'practicesView'])->name('teams.practicesView');
Route::post('teams/create', [TeamController::class, 'create'])->name('teams.create');
Route::post('teams/edit', [TeamController::class, 'edit'])->name('teams.edit');
Route::post('teams/getPosibleTeamsForPlayer', [TeamController::class, 'getPosibleTeamsForPlayer'])->name('teams.getPosibleTeamsForPlayer');

//CATEGORIES
/*
Route::put('categories/{id}/update', [CategoryController::class, 'update'])->name('categories.update');
Route::delete('categories/{id}',[CategoryController::class, 'destroy'])->name('categories.destroy');
Route::post('categories/store', [CategoryController::class, 'store'])->name('categories.store');
Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
*/

//GAMES
Route::get('games/{id}', [GameController::class, 'show'])->name('games.show');


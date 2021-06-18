<?php


use App\Models\Team;
use App\Models\Player;
use Illuminate\Support\Facades\Auth;
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
use App\Http\Controllers\Publics\IndexController;


use App\Http\Controllers\LoginController;
use App\Http\Controllers\Publics\GameController as GameControllerPublic;
use App\Http\Controllers\Publics\TeamController as TeamControllerPublic;
use App\Http\Controllers\Publics\PlayerController as PlayerControllerPublic;
use App\Http\Controllers\SendMessageController;
use App\Http\Controllers\UserController;
use App\Models\User;

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



//AUTH
Auth::routes();

//Rutas públicas
Route::middleware(['guest'])->group(function(){
    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::get('/results', [IndexController::class, 'results'])->name('results');
    Route::get('/contact', [IndexController::class, 'contact'])->name('contact');
    Route::get('/teams', [TeamControllerPublic::class, 'index'])->name('teams');
    Route::get('/teams/{id}', [TeamControllerPublic::class, 'show'])->name('teams.show');


    Route::get('/games/{id}', [GameControllerPublic::class, 'show'])->name('games.show');

    Route::get('/players/{id}', [PlayerControllerPublic::class, 'show'])->name('players.show');

    Route::post('/players/getModalCard', [PlayerControllerPublic::class, 'getModalCard'])->name('players.getModalCard');

    //MESSAGES
    Route::post('/messages/guest', [SendMessageController::class, 'guestSend'])->name('messages.guest');
});


//Rutas para usuarios
Route::middleware(['auth'])->group(function(){
    Route::get('/messages', [SendMessageController::class, 'index'])->name('messages.index');
    Route::get('/messages/create', [SendMessageController::class, 'create'])->name('messages.create');
    Route::get('/messages/create/public', [SendMessageController::class, 'createPublic'])->name('messages.createPublic');
    Route::post('/messages/show', [SendMessageController::class, 'show'])->name('messages.show');
    Route::post('/messages/store', [SendMessageController::class, 'store'])->name('messages.store');
    Route::delete('messages/{id}',[SendMessageController::class, 'destroy'])->name('messages.destroy');
    Route::get('/config', [UserController::class , 'config'])->name('users.config');
    Route::put('/users/updatePassword', [UserController::class, 'updatePassword'])->name('users.UpdatePassword');
});

//Rutas para usuarios con rol Aministrador o Entrenador
Route::middleware(['auth', 'admin'])
->name('admin.')
->prefix('admin')
->group(function(){

    Route::get('/', function(){
    })->name('index');

    //PEOPLE
    Route::put('people/{id}/update', [PeopleController::class, 'update'])->name('people.update');
    Route::delete('people/{id}',[PeopleController::class, 'destroy'])->name('people.destroy');
    Route::post('people/store', [PeopleController::class, 'store'])->name('people.store');
    Route::post('people/update-image', [PeopleController::class, 'updateImage'])->name('people.uptade_image');
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
    Route::post('players/evaluate', [PlayerController::class, 'evaluate'])->name('players.evaluate');
    Route::post('players/evaluate/store/{id}', [PlayerController::class, 'evaluateStore'])->name('players.evaluate.store');


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
    Route::post('teams/getAllListablePlayers', [TeamController::class, 'getAllListablePlayers'])->name('teams.getAllListablePlayers');
    Route::post('teams/savePlayersForNextGame', [TeamController::class, 'savePlayersForNextGame'])->name('teams.savePlayersForNextGame');
    Route::post('teams/{id}/savePraticesDays', [TeamController::class, 'savePraticesDays'])->name('teams.savePraticesDays');
    Route::post('teams/freePlayersForTeam', [TeamController::class, 'freePlayersForTeam'])->name('teams.freePlayersForTeam');
    Route::post('teams/{id}/savePlayersOnTeam', [TeamController::class, 'savePlayersOnTeam'])->name('teams.savePlayersOnTeam');


    //GAMES
    Route::put('games/{id}/update', [GameController::class, 'update'])->name('games.update');
    Route::get('games/{id}', [GameController::class, 'show'])->name('games.show');
    Route::get('games', [GameController::class, 'index'])->name('games.index');
    Route::get('results', [GameController::class, 'results'])->name('results.index');
    Route::post('results/addVideo', [GameController::class, 'addVideo'])->name('results.addVideo');
    Route::put('results/{id}/addVideoStore', [GameController::class, 'addVideoStore'])->name('results.addVideoStore');
    Route::delete('games/{id}',[GameController::class, 'destroy'])->name('games.destroy');
    Route::post('games/store', [GameController::class, 'store'])->name('games.store');
    Route::post('/games/create', [GameController::class, 'create'])->name('games.create');
    Route::post('games/edit', [GameController::class, 'edit'])->name('teams.edit');


    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});







<?php

namespace App\Http\Controllers;

use App\Models\People;
use App\Models\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function index(){
        return Player::index();
    }
}

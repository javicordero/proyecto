<?php

namespace App\Http\Controllers;

use App\Models\SendMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
        $user = Auth::user();
        $messagesReceived = $user->messagesReceived;
        $message = SendMessage::find(1);
        $data = compact('messagesReceived', 'message');
        return view('messages.index', compact('data'));
    }
}

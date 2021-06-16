<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SendMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SendMessageController extends Controller
{
    public function guestSend(Request $request){

        $message = new SendMessage();
        $message->title = $request->title;
        $message->content = $request->content;
        $message->sender_name = $request->name;
        $message->sender_email = $request->email;
        $message->user_receive_id = 1;
        $message->save();

        return back()->with('status', 'Mensaje enviado');
    }

    public function show(Request $request){
        $message = SendMessage::find($request->messageId);
        $message->read = true;
        $message->save();
        $data = compact('message');
        return view('messages.show', compact('data'));
    }

    public function create(){
        $users = User::all();
        $data = compact('users');
        return view('messages.create' , compact('data'));
    }

    public function store(Request $request){
        foreach($request->user_receive_id as $user_receive_id){
            $message = new SendMessage();
            $message->title = $request->title;
            $message->content = $request->content;
            $message->user_send_id = Auth::user()->id;
            $message->user_receive_id = $user_receive_id;
            $message->save();
        }

        return back()->with('status', 'Mensaje enviado');
    }

    public function destroy($id){
        $message = SendMessage::find($id);
        $message->delete();

        return back();
    }
}

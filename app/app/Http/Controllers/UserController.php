<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SendMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function config(){
        return view('users.config');
    }

    public function updatePassword(Request $request){
       if(Hash::check($request->password1, Auth::user()->password)){
           $user = User::find(Auth::user()->id);
           $user->password = bcrypt($request->password2);
           $user->save();
           return back()->with('status', 'Contraseña actualizada');;
       }

       return back()->withErrors(['password' => 'Contraseña incorrecta']);


    }
}

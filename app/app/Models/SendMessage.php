<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SendMessage extends Model
{
    use HasFactory;

    public function userSend(){
        return $this->belongsTo(User::class, 'user_send_id', 'id');
    }

    public function userRecieve(){
        return $this->belongsTo(User::class, 'user_receive_id', 'id');
    }


    public function getSenderImagePathAttribute(){
        if($this->userSend){
            return $this->userSend->image_path;
        }
        return '/images/users/default.jpg';
    }

    public function getMessageSenderNameAttribute(){
        //Admin
        if($this->userSend && $this->userSend->id == 1){
            return $this->userSend->name;
        }
        //Usuario
        if($this->userSend){
            return $this->userSend->person->full_name;
        }
        //Invitado
        return $this->sender_name.' (Invitado)';
    }

    public function getMessageSenderEmailAttribute(){
        //Admin
        if($this->userSend && $this->userSend->id == 1){
            return $this->userSend->email;
        }
        //Usuario
        if($this->userSend){
            return $this->userSend->email;
        }
        //Invitado
        return $this->sender_email;
    }

    public function getContentResumeAttribute(){
        return substr($this->content, 0, 15).'...';
    }

    public function getDateAttribute(){
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('d/m/Y');
    }


}

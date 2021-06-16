<?php

namespace App\Models;

use GuzzleHttp\Psr7\Message;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Relacion 1:1 con People
    public function person(){
        return $this->hasOne(People::class);
    }

    //Relacion 1:N con mensajes (1:User || N: Mensajes) (para los mensajes recibidos)
    public function messagesReceived(){
        return $this->hasMany(SendMessage::class, 'user_receive_id', 'id')->orderBy('created_at', 'desc');
    }


    //Relacion 1:N con mensajes (1:User || N: Mensajes) (para los mensajes recibidos)
    public function messagesSended(){
        return $this->hasMany(SendMessage::class, 'user_send_id', 'id');
    }

     //Atributo image_path
     public function getImagePathAttribute(){
        if($this->image){
            if(substr($this->image, 0, 4) != 'http'){
                return '/images/users/'.$this->image;
            }
            else{
                return $this->image;
            }
        }
        else{
            return '/images/users/default.jpg';
        }
    }
}

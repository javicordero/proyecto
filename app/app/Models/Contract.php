<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Contract extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $dates = ['date_start', 'date_end'];


    //Relacion 1:N con Tean (1: Team || N: Conctract)
    public function team(){
        return $this->belongsTo(Team::class);
    }

   //Relacion 1:N con People (1: People || N: Conctract)
    public function person(){
        return $this->belongsTo(People::class, 'people_id');
    }
}

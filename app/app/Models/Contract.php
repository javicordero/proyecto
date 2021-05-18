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

    protected $casts = [
        'date_start' => 'datetime:d/m/Y', // Change your format
        'date_end' => 'datetime:d/m/Y',
    ];

    //Relacion 1:N con Tean (1: Team || N: Conctract)
    public function team(){
        return $this->belongsTo(Team::class);
    }

    //Relacion N:M con People
    public function person(){
        return $this->belongsToMany(People::class);
    }
}

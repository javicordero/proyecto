<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TeamPracticeDay extends Model
{
    use HasFactory;

    //Relacion 1:N con TeampracticeDay (1: Team || N: TeampracticeDay)
    public function team(){
        return $this->belongsTo(Team::class);
    }

    public function getDayNameAttribute(){
        if($this->day == 1){
            return 'Lunes';
        }
        if($this->day == 2){
            return 'Martes';
        }
        if($this->day == 3){
            return 'Miércoles';
        }
        if($this->day == 4){
            return 'Jueves';
        }
        if($this->day == 5){
            return 'Viernes';
        }
    }

    //Hora fin entrrenamiento
    public function getTimeEndAttribute(){
        $time = Carbon::parse($this->time);
        $endTime = $time->addMinutes(90);
        return $endTime->format('H:i');
    }

    //Quita los segundos de la hora
    public function getTimeFormateadaAttribute(){
        return Carbon::createFromFormat('H:i:s',$this->time)->format('H:i');
    }
}

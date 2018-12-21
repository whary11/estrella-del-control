<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    public function respuestas(){
        return $this->hasMany(Respuesta::class);
    }

    public function users(){
        return $this->hasOne(User::class);
    }
    
}

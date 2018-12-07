<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
    protected $fillable = [
        'nombre',
    ];


    public function preguntas(){
        return $this->hasMany(Pregunta::class);
    }
}

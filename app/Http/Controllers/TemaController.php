<?php

namespace App\Http\Controllers;

use App\Tema;
use Illuminate\Http\Request;

class TemaController extends Controller
{
    public function get(){
        return Tema::all(); 
    }
}

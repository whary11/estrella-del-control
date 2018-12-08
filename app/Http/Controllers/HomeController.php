<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tema;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Respuesta;
use App\Pregunta;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $temas = Tema::all()->where('estado','===','PUBLISHED');
        // return $temas;
        return view('admin.principal', compact('temas'));
    }

    public function juego($url){
        $temas = Tema::with(['preguntas'])
                        ->get()
                        ->where('url','==',$url)
                        ->first();

                        $respuestas=[];
        foreach ($temas->preguntas as $key => $pregunta) {
            $resp = Pregunta::with(['respuestas'])
                    ->where('id','=',$pregunta->id)
                    ->get()
                    ->first();
                    $respuestas[$key] = $resp;
        } 


        return( $respuestas );
    } 





















    public function apis(){
        // Haciendo las consultas por medio de las relaciones ya programadas en los modelos
        $usuario = User::with(['temas', 'preguntas'])
                    ->where('id', '=', Auth::Id())
                    ->get()
                    ->first();

        $temas = Tema::with(['preguntas'])
                        ->get()
                        ->first();

        $respuestas=[];
        foreach ($temas->preguntas as $key => $pregunta) {
            $resp = Pregunta::with(['respuestas'])
                    ->where('id','=',$pregunta->id)
                    ->get()
                    ->first();
                    $respuestas[$key] = $resp;
        } 
        return ( $respuestas );
    }
}
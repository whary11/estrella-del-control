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
        //Enviar una respuesta preguntas con 4 respuestas aleatorias.


        return view('admin.tema');
    } 





















    public function apis(){

        $tema_id = 1;

            $resp = Pregunta::with(['respuestas'])
                    ->where('tema_id','=',$tema_id)
                    ->inRandomOrder()
                    ->get()
                    ->first();
        return ( $resp );
    }
}
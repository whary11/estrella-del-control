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
    public function dash()
    {

        
        // return $temas;
        return view('admin.dashboard.index');
    }



    public function juego($url){
        $tema = Tema::where('url','=',$url)
                        ->get()
                        ->first();

                        $pregunta = $this->apis($tema->id);

        // for ($i=0; $i < 100; $i++) { 
        //     $pregunta = Pregunta::with(['respuestas'])
        //                     ->where('tema_id','=',$tema->id)
        //                     ->inRandomOrder()
        //                     ->get()
        //                     ->first();
        //     if (count($resp->respuestas)==4) {
        //         return ( $pregunta );                        
        //     }
        // }
 
        //Enviar una respuesta preguntas con 4 respuestas aleatorias.

            // return $pregunta;
        return view('admin.tema', compact('pregunta'));
    } 





















    public function apis($tema_id = 1){
        // $tema_id = 1;
        for ($i=0; $i < 100; $i++) { 
            $resp = Pregunta::with(['respuestas'])
                            ->where('tema_id','=',$tema_id)
                            ->inRandomOrder()
                            ->get()
                            ->first();
            if (count($resp->respuestas)==4) {
                return ( $resp );                        
            }
        }
            
    }
}
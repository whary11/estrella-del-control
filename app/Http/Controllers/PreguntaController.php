<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Respuesta;
use App\Pregunta;

class PreguntaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function get(Request $request){
        // return $request->idPreguntaAnterior;
        return $this->getPregunta($request->idTema, $request->idPreguntaAnterior);
    }


    public function getPregunta($tema_id, $preguntaAnte){
        // $tema_id = 1;
        for ($i=0; $i < 100; $i++) { 
            $resp = Pregunta::with( ['respuestas'] )
                            ->where( 'tema_id' , '=' ,$tema_id )
                            ->where( 'id' , '!=' , $preguntaAnte )
                            ->inRandomOrder()
                            ->get()
                            ->first();
            if ( count( $resp->respuestas ) == 4 ) {
                return ( $resp );                        
            }
        }
            
    }

    
}

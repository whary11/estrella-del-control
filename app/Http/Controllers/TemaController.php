<?php

namespace App\Http\Controllers;

use App\Tema;
use Illuminate\Http\Request;

class TemaController extends Controller
{
    public function get(){
        return Tema::all(); 
    }
    public function edit(Request $request){
        $tema = Tema::where('id', $request->id)
            ->update([
                'nombre' => $request->nombre,
                'url' => str_slug($request->nombre,'-')
                ]
            );
        return Tema::find($request->id);
    }
}

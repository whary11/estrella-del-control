@extends('admin.layouts.app')

@section('content')

<style>
         /* [v-cloak] {
            display: none;
         } */
         .puntuacion{
            position: fixed;
            top: 30%;
         }
         .detalle{
            padding: 15px;
         }
         .off{
            margin-left: -280px;
            border-right-width: 10px;
            border-right-color: teal !important;
            border-right-style: solid;
         }
         .on{

         }
   </style>

<div id="temas" v-cloak>
<section class="container">
             <section class="row">
                 <section class="col m8 s12 offset-m2">
                     <div class="card">
                        <div class="card-content">
                            <p>@{{ pregunta.nombre}}</p>
                            <br>
                            <section v-for="resp in pregunta.respuestas">
                               <p>
                                 <label>
                                    <input name="group1" type="radio" @click="capturar(resp)"/>
                                    <span>@{{resp.nombre}}</span>
                                 </label>
                              </p> 
                              <br>                            
                           </section>
                           <button class="btn btn primary" @click="validar()">Responder</button>
                            <br>                                        
                        </div>
                     </div>
                 </section>
             </section>
         </section>








            <div class="row puntuacion z-depth-5" v-bind:class="{on: active, 'off': !active}" @click="cambiarEstadoClase()">
               <div class="amber lighten-1 col m-4">
                  <h4 class="center-align">Resumen de puntos</h4>
                  <div class="detalle">
                     <p class="center-align">Llevas @{{detalle.tiempT}}</p>
                     <p class="center-align">Iniciaste a las @{{detalle.hora}}</p>
                     <p class="center-align">@{{detalle.puntos}} Puntos</p>
                     <p class="center-align">Nivel @{{detalle.nivel}}</p>
                  </div>
               </div>
            </div>









         <!-- Modal  para conteo-->
        <div id="conteo" class="modal" style="width:400px">
            <div class="modal-content">
                <p></p>
                <h1 class="center-align">@{{fin_contador}}</h1>
                <p class="center-align">Para jugar</p>
            </div>
        </div>




</div>
   <script src="/js/juego.min.js"></script>

    
@endsection
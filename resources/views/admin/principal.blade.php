


@extends('admin.layouts.app')

@section('content')
    
        <section class="container">
            <div class="row">
                @foreach ($temas as $tema)
                <div class="col s12 m4" v-for="tema in temas" style="cursor:pointer;">
                    <div class="card hoverable">
                    {{-- <div class="card-image">
                        <img :src="tema.imagen" height="200px">
                        <span class="card-title black-text">{{$tema->nombre}}</span>
                    </div> --}}
                    <div class="card-content">
                        <p>{{ substr($tema->descripcion, 0, 90) }}</p>
                    </div>
                    <div class="card-action">
                        <a href="temas/{{$tema->url}}">Jugar</a>
                    </div>
                    </div>
                </div>
                @endforeach
            </div>
        </section>            
    </div>
                    
                    





                    <!-- Compiled and minified JavaScript -->
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
@endsection



@extends('admin.layouts.app')

@section('content')

<div id="dash">
    <div class="container">
    <table>
        <thead>
          <tr>
              <th>Nombre</th>
              <th>url</th>
              <th>editar</th>
          </tr>
        </thead>

        <tbody>
          <tr v-for="tema in temas">
            <td>@{{ tema.nombre }} </td>
            <td>@{{ tema.url }}</td>
            <td><a :href="tema.id"><i class="material-icons">edit</i></a></td>
          </tr>
        </tbody>
    </table>
    </div>
    
</div>



    <script src="/js/dash.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
                var elems = document.querySelectorAll('.sidenav');
                var instances = M.Sidenav.init(elems, {});
                var botonesFlotantes = document.querySelectorAll('.fixed-action-btn');
                var instances = M.FloatingActionButton.init(botonesFlotantes, {});
        });
    </script>
@endsection
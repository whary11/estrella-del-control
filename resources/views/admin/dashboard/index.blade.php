
@extends('admin.layouts.app')

@section('content')
            <div id="dash" v-cloak>
                <div class="container">
                    <h3 class="center-align">Temas</h3>
                    <table class="highlight animated bounce">
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
                            <td><a @click="editTema(tema)" class="red btn-large btn-floating blue"><i class="material-icons">edit</i></a></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
@endsection

@section('script')
    <script src="/js/dash.min.js"></script>
@endsection


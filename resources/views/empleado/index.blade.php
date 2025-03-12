<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js" ></script>
@extends('layouts.app')

@section('content')
<div class="container">


@if (Session::has('mensaje'))
<div class="alert alert-success alert-dismissible" role="alert">
{{Session::get('mensaje')}}

<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>

</div>
@endif

<a href="{{url('empleado/create')}}" class="btn btn-success" >NUEVO EMPLEADO</a>
<br/>
<br/>
<table class="table table-light">

    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Correo</th>
            <th>Contrseña</th>
            <th>Telefono</th>
            <th>Acciones</th>

        </tr>
    </thead>

    <tbody>
        @foreach ($empleados as $empleado )
        <tr>
            <td>{{ $empleado->id }}</td>


            <td>
                <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$empleado->Foto }}" width="100" alt="">

            </td>

            <td>{{ $empleado->Nombre }}</td>
            <td>{{ $empleado->ApellidoPaterno }}</td>
            <td>{{ $empleado->ApellidoMaterno }}</td>
            <td>{{ $empleado->Correo }}</td>
            <td>{{ $empleado->Password }}</td>
            <td>{{ $empleado->Telefono }}</td>
            <td>
                <a href="{{ url('/empleado/'.$empleado->id.'/edit' ) }}" class="btn btn-warning">
                    Editar
                </a>
                |

                <form action="{{ url('/empleado/'.$empleado->id ) }}" class="d-inline" method="post">
                    @csrf
                    {{method_field('DELETE')}}
                <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quieres Borrar?')" value="Borrar">

            </form>

                </td>
        </tr>
        @endforeach
    </tbody>

</table>
{!! $empleados->links() !!}
<a href="{{route('export')}}" class="btn btn-success" >Exportar</a>
</div>
@endsection

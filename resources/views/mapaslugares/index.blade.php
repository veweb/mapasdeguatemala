@extends('layouts.admin')


@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Mantenimiento de Mapas</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('mapaslugares.create') !!}">Agregar</a>
        </div>

        <div class="row">
            @if($mapaslugares->isEmpty())
                <div class="well text-center">No existe lista de mapas.</div>
            @else
                <table class="table">
                    <thead>
                        <th>IDM</th>
                    <th>Nombre</th>
        			<th>Imagen</th>
        			<th>Estado</th>
        			<th>Pais Id</th>
        			<th>Departamento Id</th>
        			<th>Municipio Id</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($mapaslugares as $mapaslugares)
                        <tr>
                            <td>{!! $mapaslugares->id !!}</td>
                            <td>{!! $mapaslugares->nombre !!}</td>
        					<td>{!! $mapaslugares->imagen !!}</td>
        					<td>{!! $mapaslugares->estado !!}</td>
        					<td>{!! $mapaslugares->pais($mapaslugares->pais_id) !!}</td>
        					<td>{!! $mapaslugares->departamento($mapaslugares->departamento_id) !!}</td>
        					<td>{!! $mapaslugares->municipio($mapaslugares->municipio_id)!!}</td>
                            <td>
                                <a href="{!! route('mapaslugares.edit', [$mapaslugares->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('mapaslugares.delete', [$mapaslugares->id]) !!}" onclick="return confirm('Are you sure wants to delete this mapaslugares?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
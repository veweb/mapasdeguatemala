@extends('layouts.admin')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Municipios</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('municipios.create') !!}">Agregar</a>
        </div>

        <div class="row">
            @if($municipios->isEmpty())
                <div class="well text-center">No hay Municipios.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Departamento Id</th>
			<th>Nombre</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($municipios as $municipio)
                        <tr>
                            <td>{!! $municipio->departamento_id !!}</td>
					<td>{!! $municipio->nombre !!}</td>
                            <td>
                                <a href="{!! route('municipios.edit', [$municipio->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('municipios.delete', [$municipio->id]) !!}" onclick="return confirm('Are you sure wants to delete this Municipio?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
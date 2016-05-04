@extends('layouts.admin')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Departamentos</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('departamentos.create') !!}">Agregar</a>
        </div>

        <div class="row">
            @if($departamentos->isEmpty())
                <div class="well text-center">No existen departamentos.</div>
            @else
                <table class="table">
                    <thead>
                   
			<th>Pais Id</th>
			<th>Nombre</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($departamentos as $departamento)
                        <tr>
                            <td>{!! $departamento->pais_id !!}</td>
				
					<td>{!! $departamento->nombre !!}</td>
                            <td>
                                <a href="{!! route('departamentos.edit', [$departamento->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('departamentos.delete', [$departamento->id]) !!}" onclick="return confirm('Are you sure wants to delete this Departamento?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
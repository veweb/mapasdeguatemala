@extends('layouts.admin')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">Pais</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('pais.create') !!}">Agregar</a>
        </div>

        <div class="row">
            @if($pais->isEmpty())
                <div class="well text-center">No Pais found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Codigo</th>
			<th>Nombre</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($pais as $pais)
                        <tr>
                            <td>{!! $pais->codigo !!}</td>
					<td>{!! $pais->nombre !!}</td>
                            <td>
                                <a href="{!! route('pais.edit', [$pais->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('pais.delete', [$pais->id]) !!}" onclick="return confirm('Are you sure wants to delete this Pais?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
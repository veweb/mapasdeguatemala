@extends('app')

@section('content')

    <div class="container">

        @include('flash::message')

        <div class="row">
            <h1 class="pull-left">tiponegocios</h1>
            <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('tiponegocios.create') !!}">Agregar</a>
        </div>

        <div class="row">
            @if($tiponegocios->isEmpty())
                <div class="well text-center">No tiponegocios found.</div>
            @else
                <table class="table">
                    <thead>
                    <th>Categoria Id</th>
                    <th width="50px">Action</th>
                    </thead>
                    <tbody>
                     
                    @foreach($tiponegocios as $tiponegocio)
                        <tr>
                            <td>{!! $tiponegocio->categoria_id !!}</td>
                            <td>
                                <a href="{!! route('tiponegocios.edit', [$tiponegocio->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                <a href="{!! route('tiponegocios.delete', [$tiponegocio->id]) !!}" onclick="return confirm('Are you sure wants to delete this tiponegocio?')"><i class="glyphicon glyphicon-remove"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
@endsection
@extends('layouts.admin')


@section('content')
<div class="container">
	<div class="row">
	<h1 class="page-header"> Editar destino </h1>

    @include('common.errors')

    {!! Form::model($mapaslugares, ['route' => ['mapaslugares.update', $mapaslugares->id], 'method' => 'patch']) !!}

        @include('mapaslugares.fields')

    {!! Form::close() !!}
</div>
</div>
@endsection

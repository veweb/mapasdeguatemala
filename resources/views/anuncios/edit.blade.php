@extends('layouts.admin')

@section('content')
<div class="container">
	<div class="row">
	<h1 class="page-header"> Editar Anuncio </h1>

    @include('common.errors')

    {!! Form::model($anuncio, ['route' => ['anuncios.update', $anuncio->id], 'method' => 'patch']) !!}

        @include('anuncios.fields')

    {!! Form::close() !!}
</div>
</div>
@endsection

@extends('layouts.admin')

@section('content')
<div class="container">
	<div class="row">
	<h1 class="page-header"> Agregar Anuncio </h1>

    @include('common.errors')

    {!! Form::open(['route' => 'anuncios.store','novalidate'=>'novalidate','files'=>true]) !!}

        @include('anuncios.fields')

    {!! Form::close() !!}
</div>
</div>
@endsection



 


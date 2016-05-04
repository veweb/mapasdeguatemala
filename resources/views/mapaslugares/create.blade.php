@extends('layouts.admin')


@section('content')

<div class="container">
<div class="row">
	<h1 class="page-header"> Destino </h1>
    @include('common.errors')

    {!! Form::open(['route' => 'mapaslugares.store','files'=>true]) !!}

        @include('mapaslugares.fields')

    {!! Form::close() !!}
</div>
</div>
@endsection

@extends('layouts.admin')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($municipio, ['route' => ['municipios.update', $municipio->id], 'method' => 'patch']) !!}

        @include('municipios.fields')

    {!! Form::close() !!}
</div>
@endsection

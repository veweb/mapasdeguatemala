@extends('layouts.admin')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($pais, ['route' => ['pais.update', $pais->id], 'method' => 'patch']) !!}

        @include('pais.fields')

    {!! Form::close() !!}
</div>
@endsection

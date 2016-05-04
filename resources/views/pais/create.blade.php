@extends('layouts.admin')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'pais.store']) !!}

        @include('pais.fields')

    {!! Form::close() !!}
</div>
@endsection

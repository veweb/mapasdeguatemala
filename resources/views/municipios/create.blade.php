@extends('layouts.admin')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'municipios.store']) !!}

        @include('municipios.fields')

    {!! Form::close() !!}
</div>
@endsection

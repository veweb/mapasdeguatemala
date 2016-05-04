@extends('layouts.admin')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'departamentos.store']) !!}

        @include('departamentos.fields')

    {!! Form::close() !!}
</div>
@endsection

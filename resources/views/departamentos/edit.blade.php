@extends('layouts.admin')
@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($departamento, ['route' => ['departamentos.update', $departamento->id], 'method' => 'patch']) !!}

        @include('departamentos.fields')

    {!! Form::close() !!}
</div>
@endsection

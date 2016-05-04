@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::model($tiponegocio, ['route' => ['tiponegocios.update', $tiponegocio->id], 'method' => 'patch']) !!}

        @include('tiponegocios.fields')

    {!! Form::close() !!}
</div>
@endsection

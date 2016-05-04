@extends('app')

@section('content')
<div class="container">

    @include('common.errors')

    {!! Form::open(['route' => 'tiponegocios.store']) !!}

        @include('tiponegocios.fields')

    {!! Form::close() !!}
</div>
@endsection

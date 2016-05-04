@extends('layouts.admin')

@section('content')

{!!Form::open()!!}

		<div class="form-group">
			{!!Form::label('Nombre:')!!}
			{!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Ingrese nombre de mapa'])!!}
		</div>
		<div class="form-group">
			{!!Form::label('Mapa:')!!}
			{!!Form::file('imagen')!!}
		</div>
		<div class="form-group">
			{!!Form::label('Estado:')!!}
			{!!Form::select('departamento',array('' => 'seleccione un departamento','1'=>'Activo','0' =>'Inactivo'))!!}
		</div>
		<div class="form-group">
			{!!Form::label('Alto:')!!}
	
			{!!Form::text('alto',null,['class'=>'form-control','placeholder'=>'Selecione el acho'])!!}
		</div>
		<div class="form-group">
			{!!Form::label('Ancho:')!!}
			{!!Form::text('nombre',null,['class'=>'form-control','placeholder'=>'Seleccione el alto'])!!}
		</div>
		<div class="form-group">
			{!!Form::label('Pais:')!!}
			{!!Form::select('pais',array('seleccione un pais'))!!}
		</div>
		<div class="form-group">
			{!!Form::label('Departamento:')!!}
			{!!Form::select('departamento',array('seleccione un departamento'))!!}
		</div>
		<div class="form-group">
			{!!Form::label('Municipio:')!!}
			{!!Form::select('municipio',array('seleccione un municipio'))!!}
		</div>
		{!!Form::Close()!!}

<button class="btn btn-primary">Guardar</button>
@stop
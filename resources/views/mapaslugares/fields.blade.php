<div class="row">
<!--- Nombre Field --->
<div class="form-group col-sm-6 col-lg-4">

    {!! Form::label('nombre', 'Nombre:') !!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!--- Imagen Field --->

<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('imagen') !!}
    {!! Form::file('imagen', null, ['class' => 'form-control']) !!}
</div>

<!--- Estado Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('estado', 'Estado:') !!}
    {!! Form::select('estado', ['placeholder' => 'Seleccione un estado','0' => 'Inactivo','1'=>'Activo'], ['class' => 'form-control']) !!}
</div>
</div>
<div class="row">




<!--- Departamento Id Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::hidden('pais_id', '1') !!}
    {!! Form::label('departamento_id', 'Departamento Id:') !!}
    {!! Form::select('departamento_id', ['placeholder' => 'Seleccione un departamento']+$departamentos,['id'=>'departamento']) !!}
</div>


<!--- Municipio Id Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('municipio_id', 'Municipio Id:') !!}
    {!! Form::select('municipio_id',  ['placeholder' => 'Seleccione un Municipio'],null,['id'=>'municipio'], ['class' => 'form-control']) !!}
</div>
</div
<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
</div>

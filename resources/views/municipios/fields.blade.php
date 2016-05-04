<!--- Departamento Id Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('departamento_id', 'Departamento Id:') !!}
    {!! Form::select('departamento_id', $departamentos) !!}
</div>



<!--- Nombre Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>


<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>

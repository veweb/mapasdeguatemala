<!--- Pais Id Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('pais_id', 'Pais Id:') !!}
    {!! Form::select('pais_id', $paises) !!}
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

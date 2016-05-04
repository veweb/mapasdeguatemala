<div class="row">
<!--- Titulo Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('titulo', 'Titulo:') !!}
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    {!! Form::text('titulo', null, ['class' => 'form-control']) !!}
</div>

<!--- Descripcion Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('imagen') !!}
    {!! Form::file('imagen', null, ['class' => 'form-control']) !!}
</div>
</div>
<div class="row">
<!--- Enlace Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('enlace', 'Enlace:') !!}
    {!! Form::text('enlace', null, ['class' => 'form-control']) !!}

</div>

<!--- Estado Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('estado', 'Estado:') !!}<br>
    {!! Form::select('estado', ['placeholder' => 'Seleccione un estado','0' => 'Inactivo','1'=>'Activo'], ['class' => 'form-control']) !!}
</div>


<!--- Departamento Id Field --->
<div class="form-group col-sm-6 col-lg-4">
</div>

</div>
<div class="row">

<!--- Departamento Id Field --->
<div class="form-group col-sm-6 col-lg-3">
    {!! Form::label('departamento_id', 'Departamento:') !!}<br>
    {!! Form::select('departamento_id', ['placeholder' => 'Seleccione un departamento']+$departamentos,['id'=>'departamento']) !!}
</div>

<!--- Municipio Id Field --->
<div class="form-group col-sm-6 col-lg-3">
    {!! Form::label('municipio_id', 'Municipio:') !!}<br>
    {!! Form::select('municipio_id',  ['placeholder' => 'Seleccione un Municipio'],null,['id'=>'municipio']) !!}
</div>


<!--- Categoria Id Field --->
<div class="form-group col-sm-6 col-lg-3">  
    {!! Form::label('categoria_id', 'Categoria:') !!}
    {!! Form::select('categoria_id', ['placeholder' => 'Seleccione una Categoria']+$categorias,['id'=>'categoria']) !!}
</div>

<!--- Mapa Id Field --->
<div class="form-group col-sm-6 col-lg-3">
    {!! Form::label('mapa_id', 'Lugar:') !!}<br>
    {!! Form::select('mapa_id',  ['placeholder' => 'Seleccione un Lugar'],null,['id'=>'nombre']) !!}
</div>
</div>
<div class="row">
<!--- Posicion Mapa Field --->
<div class="form-group col-sm-6 col-lg-4">
    {!! Form::label('posicion_mapa', 'Posicion Mapa:') !!}<br>
    {!! Form::text('posicion_mapa', null, ['class' => 'form-control']) !!}
    <!-- Trigger the modal with a button --><br>
<button type="button" id="vermapa" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Posición de anuncio</button>
</div></div>



<!--- Submit Field --->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
</div>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

 
 
     
        <div id="zoom_container">
        <img id="mapa"  src="/images/upload/mapas/antigua-2016-map-01.jpg" />
  
      </div>
       <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Guardar</button>
      </div>
    

  </div>
</div>



@extends('layouts.admin')

@section('content')

  

        @include('flash::message')
        <div class="properties-items isotope" style="position: relative; overflow: hidden; height: 812px;">
           <div class="container-fluid">
                <div class="row">
                    <h1 class="pull-left">Lista de Anuncios Publicados lista</h1>
                    <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('anuncios.create') !!}">Agregar</a>
                </div>
            </div> 
            
              
         </div>   
@endsection
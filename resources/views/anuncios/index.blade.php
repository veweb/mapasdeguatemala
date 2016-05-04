@extends('layouts.admin')

@section('content')

  

        @include('flash::message')
        <div class="properties-items isotope" style="position: relative; overflow: hidden; height: 812px;">
           <div class="container-fluid">
                <div class="row">
                    <h1 class="pull-left">Lista de Anuncios Publicados</h1>
                    <a class="btn btn-primary pull-right" style="margin-top: 25px" href="{!! route('anuncios.create') !!}">Agregar</a>
                </div>
            </div> 
            
                <div class="row">
                    @if($anuncios->isEmpty())
                        <div class="well text-center">No anuncios found.</div>
                    @else
                 
                           
                    <?php    $pos = 0; $i=0; $pos1 = 100; ?>
                             @foreach($anuncios as $anuncio)
                             <?php if($i == '4'){
                                         $i= 1;
                                         $pos= 0;
                                         $pos1= 450;
                                        }
                                        ?>
                            <?php  if($anuncio->usuario_id == Auth::user()->id){ 
                                $i= $i +1; 
                                      
                                ?>
                              <div class="property-item property-featured col-sm-6 col-md-3 isotope-item" style="position: absolute; left: 40px; top: {!! $pos1 !!}px; transform: translate({!! $pos !!}px, 0px);">
                                <div class="property-box">
                                    <div class="property-box-inner">
                                        <h3 class="property-box-title"><a href="{!! $anuncio->enlace !!}">{!! $anuncio->titulo !!}</a></h3> 
                                        <h4 class="property-box-subtitle"><a href="property-detail.html">{!! $anuncio->descripcion   !!}</a></h4>

                                        <div class="property-box-label property-box-label-primary">Prueba Gratis</div>
                                    <!-- /.property-box-label -->

                                        <div class="property-box-picture">
                                        <div class="property-box-price">  <?php echo $i; ?> </div>
                                        <!-- /.property-box-price -->
                                        <div class="property-box-picture-inner">
                                            <a class="property-box-picture-target" href="property-detail.html">
                                                <img alt="" src="images/upload/anucios/{!! $anuncio->imagen !!}">
                                            </a><!-- /.property-box-picture-target -->
                                        </div>
                                        <!-- /.property-picture-inner -->
                                    </div>
                                    <!-- /.property-picture -->

                                    <div class="property-box-meta">
                                        <div class="property-box-meta-item col-xs-3 col-sm-3">
                                            <strong>0</strong>
                                            <span>ninguno</span>
                                        </div>
                                        <!-- /.col-sm-3 -->

                                        <div class="property-box-meta-item col-xs-3 col-sm-3">
                                            <strong>0</strong>
                                            <span>ninguno</span>
                                        </div>
                                        <!-- /.col-sm-3 -->

                                        <div class="property-box-meta-item col-xs-3 col-sm-3">
                                            <strong>0</strong>
                                            <span>ninguno</span>
                                        </div>
                                        <!-- /.col-sm-3 -->

                                         <div class="property-box-meta-item col-xs-3 col-sm-3">
                                            <strong>0</strong>
                                            <span>ninguno</span>
                                        </div>
                                        <!-- /.col-sm-3 -->
                                    </div>
                                    <!-- /.property-box-meta -->
                                </div>
                                <!-- /.property-box-inner -->
                            </div>
                            <!-- /.property-box -->
                            <div>  <a href="{!! route('anuncios.edit', [$anuncio->id]) !!}"><i class="glyphicon glyphicon-edit"></i></a>
                                        <a href="{!! route('anuncios.delete', [$anuncio->id]) !!}" onclick="return confirm('Are you sure wants to delete this anuncio?')"><i class="glyphicon glyphicon-remove"></i></a>
                                 </div>
                        </div>
                        <!-- /.property-item -->
                        <?php $pos = $pos + 285; ?>
                        <?php } ?>
                        @endforeach
                         
                         </div> 
                    @endif
                   
                </div>
         </div>   
@endsection
   




                              
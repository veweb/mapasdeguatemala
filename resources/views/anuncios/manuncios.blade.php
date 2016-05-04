  @foreach($anuncios as $anuncio)
                            @if($anuncio->categoria_id == 1)
                               <?php  $path  = "hotel.png" ?>
                            @endif
                            @if($anuncio->categoria_id == 2)
                               <?php  $path  = "restaurante.png" ?>
                            @endif
                            @if($anuncio->categoria_id == 3)
                               <?php  $path  = "tours.png" ?>
                            @endif
                            <div class="item mark"data-position="{!! $anuncio->posicion_mapa !!}" data-show-at-zoom="0">
                                <div>
                                    <div  class="text" id="text-{!! $anuncio->id !!}" style="width:100px; display:none;">
                                        <strong>{!! $anuncio->titulo !!}</strong><br /> {!! $anuncio->descripcion !!}
                                        <img id="{!! $anuncio->id !!}}" src="/images/upload/anucios/{!! $anuncio->imagen !!}" width="50px" height="50px" />
                                    </div>
                                         <img src="images/{!! $path !!}" class="icono" id="{!! $anuncio->id !!}" style="cursor:pointer"  width="60px" height="79px" alt="{!! $anuncio->titulo !!}" />       
                               
                                </div>  
                            </div>
                         @endforeach    
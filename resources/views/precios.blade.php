@extends('layouts.publico')

@section('content')

<div class="container">

				<h2>PRECIOS DE ANUNCIOS</h2>
				<p></p>

				<!-- 
					BOOTSTRAP GRID
					4 columns: col-md-3
					3 columns: col-md-4
					2 columns: col-md-2
					
					For more info about bootstrap grid
					http://getbootstrap.com/css/#grid
				-->


				<!-- FOUR COLUMNS -->
				<div class="row pricetable-container">

					<div class="col-md-3 price-table">
						<h3>GRATIS</h3>
						<p>	
							$0
							<span>Beneficios</span>
						</p>

						<ul>
							<li>1 anuncio </li>
							<li>30 dias</li>
							<li>Reporte trafico</li>
						</ul>
						<a class="btn btn-primary btn-sm" href="{{ route('register') }}">Anunciarse</a>
					</div>

					<div class="col-md-3 price-table popular">
						<h3>PREMIUM</h3>
						<p>	
							
							<span>por año</span>
						</p>
						<ul>
							<li>1 anuncio</li>
							<li>365 días</li>
							<li>Reporteria de trafico</li>
							<li>Notificaciones por correo</li>
							<li>Espacio en Directorio</li>
						</ul>
						<a class="btn btn-default btn-sm" href="#">Comprar</a>
					</div>

				

				</div>
				<!-- /FOUR COLUMNS -->


			


			


			</div>


 @stop
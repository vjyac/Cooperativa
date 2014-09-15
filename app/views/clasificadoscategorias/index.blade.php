@extends('layouts.default')

@section('content')

<?php if (count($clasificadoscategorias)>0 )  { ?>


			<div id="page"><!-- - - - - - - - - - SECTION - - - - - - - - - -->

			<div class="pi-section-w pi-section-white">
			<div class="pi-section">

			<div class="pi-text-center pi-margin-bottom-50">
				<h1 class="pi-uppercase pi-weight-700 pi-has-border pi-has-tall-border pi-has-short-border">
					Clasificados
				</h1>
				<a href="/clasificados/create" class="btn pi-btn-orange pi-btn-bigger">
					Agrega tu clasificado gratis !
				</a>
				<!-- <a href="/clasificados/create" class="btn pi-btn-turquoise pi-btn-no-border pi-shadow pi-btn-bigger">
					Clasificados mas vistos !
				</a>
				<a href="/clasificados/create" class="btn pi-btn-green pi-btn-no-border pi-shadow pi-btn-bigger">
					Ultimos Clasificados !
				</a> -->

			</div>


			<div id="isotope" class="pi-row pi-grid-small-margins pi-padding-bottom-40 isotope" data-isotope-mode="masonry">






											@foreach ($clasificadoscategorias as $clasificadoscategoria)





															<!-- echo "<a href='/articulos/" . $articulo->id . "/edit' class='btn btn-xs btn-primary'>Editar</a> "; -->



											<div class="Photography pi-col-sm-4 pi-col-xs-6 isotope-item">
												<div class="pi-icon-box-vertical pi-icon-box-vertical-icon-bigger pi-text-center">

													<div class="pi-icon-box-icon pi-icon-box-icon-circle pi-icon-box-icon-base" style="background: #bbea76;">
														<a href="/clasificadoscategorias/{{ $clasificadoscategoria->id }}" class="pi-link-white">
																<img src="/img/glyphicons/png/{{ $clasificadoscategoria->icon }}" alt="" />
														</a>
													</div>

													<h5><a href='/clasificadoscategorias/{{ $clasificadoscategoria->id }}' class='pi-link-dark'>{{$clasificadoscategoria->clasificadoscategoria}}</a></h5>

													<p>
														<a href="/clasificadoscategorias/{{ $clasificadoscategoria->id }}" class="btn pi-btn-lime pi-btn-small">
															Ver
														</a>
													</p>
													<br>
												</div>
											</div>




											@endforeach



</div>


</div>
</div>

<!-- - - - - - - - - - END SECTION - - - - - - - - - --></div>



		<?php
						}
		?>


@stop

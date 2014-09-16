@extends('layouts.default')
@section('content')


<div id="page"><!-- - - - - - - - - - SECTION - - - - - - - - - -->

	<div class="pi-section-w pi-shadow-inside-top pi-section-parallax" style="background-image: url(img_external/gallery/water-wave-bg-1.jpg);">
		<div class="pi-section pi-padding-top-90 pi-padding-bottom-70 pi-text-center">

			<div class="pi-img-w pi-img-center pi-margin-bottom-40" style="width: 140px;">
				<img src="img_external/gallery/logo-big-white-circle.png" alt="">
			</div>

			<p class="lead-24 pi-weight-300 pi-uppercase pi-margin-bottom-40 pi-letter-spacing pi-text-white">
				{{trans('app.title_home')}}
			</p>

			<p>
				<a href="/pages/quienessomos" class="btn pi-btn-base pi-btn-no-border pi-shadow pi-btn-big">
					Quienes Somos
				</a>
			</p>

		</div>
	</div>
</div>





<?php if (count($articulos_tapa)) { ?>
	<?php } ?>





	<!-- Title bar -->
	<div class="pi-section-w pi-section-base pi-section-base-gradient">
		<div class="pi-texture" style="background: url(img/hexagon.png) repeat;"></div>
		<div class="pi-section" style="padding: 15px 40px 12px;">

			<div class="pi-row">
				<div class="pi-col-sm-8 pi-center-text-xs">
					<h1 class="h2 pi-weight-300 pi-margin-bottom-5">Noticias</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End title bar -->







	<div id="page"><!-- - - - - - - - - - SECTION - - - - - - - - - -->

		<div class="pi-section-w pi-section-white">
			<div class="pi-section">
				<div class="pi-row pi-padding-bottom-10 isotope" data-isotope-mode="masonry">
					@foreach ($articulos as $articulo)
					<?php
					$texto = $articulo->texto;
					$archivos = DB::table('archivos')
					->where('padre', '=', 'articulo')
					->where('padre_id', '=', $articulo->id)
					->first();

					if (preg_match('/^.{1,260}\b/s', $articulo->texto, $match))
					{ $texto = $match[0]; }
					$categoria = Categoria::find($articulo->categorias_id);
					?>

					<div class="pi-col-sm-4 pi-col-xs-6 isotope-item">
						<div class="pi-portfolio-item pi-portfolio-item-round-corners">
							@if (count($archivos)>0 )
							<div class="pi-img-w pi-img-round-corners pi-img-hover-zoom">
								<a href="/uploads/big/{{ $archivos->archivo }}" class="pi-colorbox cboxElement">
									<img src="/uploads/big/{{ $archivos->archivo }}" alt="">

									<div class="pi-img-overlay pi-no-padding pi-img-overlay-dark">
										<div class="pi-caption-centered">
											<div>
												<span class="pi-caption-icon pi-caption-icon-dark pi-caption-scale icon-search"></span>
											</div>
										</div>
									</div>
								</a>
							</div>
							@endif
							<div class="pi-portfolio-description pi-portfolio-description-round-corners-all" style="border-top-width: 1px;">
								<ul class="pi-portfolio-cats">
									<li><i class="icon-clock"></i>{{ $articulo->created_at }}</li>
									<li><i class="icon-eye"></i>{{ $articulo->visitas }} visitas</li>
									@if (Sentry::check() && Sentry::getUser()->hasAccess('admin'))
									<li><a href="/articulos/{{$articulo->id}}/edit">Editar</a></li>
									@endif
								</ul>
								<h2 class="h4"><a href="/articulos/show/{{ $articulo->url_seo }}" class="pi-link-no-style">{{ $articulo->articulo }}</a>
								</h2>
								<p>{{ $texto }}...</p>
							</div>
						</div>
					</div>




					@endforeach





				</div>


				<div class="pi-pagenav pi-text-center">
					{{ $articulos->links()}}
				</div>


			</div>
		</div>





































	</div>
</div>
</div>

@stop

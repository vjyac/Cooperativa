@extends('layouts.default')

@section('content')

<div id="page"><!-- - - - - - - - - - SECTION - - - - - - - - - -->



<!-- - - - - - - - - - END SECTION - - - - - - - - - -->



<!-- - - - - - - - - - SECTION - - - - - - - - - -->

<div class="pi-section-w pi-section-white pi-slider-enabled piTooltips piSocials">
	<div class="pi-section pi-padding-bottom-10">

		<div class="pi-row">

			<div class="pi-col-sm-9 pi-padding-bottom-40">

				<!-- Slider -->
				<div class="pi-slider-wrapper pi-slider-arrows-inside pi-slider-show-arrow-hover pi-margin-bottom-40">
					<div class="pi-slider pi-slider-animate-opacity">


					<?php foreach ($archivos as $archivo) { ?>

						<!-- Slide -->
						<div class="pi-slide">
							<div class="pi-img-w pi-img-round-corners pi-img-shadow pi-img-with-overlay">

								<a href="/uploads/big/{{ $archivo->archivo }}" class="pi-colorbox"><img src="/uploads/big/{{ $archivo->archivo }}" alt=""/></a>

							</div>
						</div>
						<!-- End slide -->

						<?php } ?>
					</div>
				</div>
				<!-- End slider -->

				<h2 class="pi-weight-600">
					{{$articulo->articulo}}
				</h2>

				<ul class="pi-meta">
					<li><i class="icon-user"></i>Subido por: <a href="#">{{$articulo->users_id}}</a></li>
					<li><i class="icon-clock"></i>{{$articulo->created_at}}</li>
					<li><i class="icon-comment"></i><a href="#">{{$categoria->categoria}}</a></li>
					@if (Sentry::check() && Sentry::getUser()->hasAccess('admin'))
						<li><i class="icon-edit"></i><a href="/articulos/{{$articulo->id}}/edit">Editar</a></li>
					@endif
				</ul>


				<p class="lead-20">
					{{$articulo->copete}}
				</p>

				<p>
					<span class="pi-dropcap">N</span>{{$articulo->texto}}
				</p>



				<!-- Box -->
				<div class="pi-box pi-box-slave pi-box-small pi-border pi-round pi-margin-bottom-40">

					<div class="pi-row">

						<div class="pi-col-sm-4 pi-center-text-xs">
							<h6 class="pi-uppercase pi-weight-700" style="margin-top: 2px;">
								Compartir esta noticia en :
							</h6>
						</div>

						<div class="pi-col-sm-8 pi-text-right pi-center-text-xs">
							<ul class="pi-social-icons pi-colored-bg pi-small pi-active-bg pi-jump pi-jump-bg pi-round pi-clearfix">
								<li><a href="http://www.facebook.com/sharer.php?u=http://www.virasorovirtual.com/articulos/{{$articulo->url_ceo}}>" class="pi-social-icon-facebook"><i class="icon-facebook"></i></a></li>
								<li><a href="http://twitter.com/share?text=Mira esta noticia !&url={{$articulo->url_ceo}}" class="pi-social-icon-twitter"><i class="icon-twitter"></i></a></li>
								<li><a href="https://plus.google.com/share?url={{$articulo->url_ceo}}" class="pi-social-icon-gplus"><i class="icon-gplus"></i></a></li>
							</ul>
						</div>

					</div>

				</div>
				<!-- End box -->


				<hr class="pi-divider pi-divider-dashed pi-divider-big">

				<h4 class="pi-has-bg pi-weight-700 pi-uppercase pi-letter-spacing pi-margin-bottom-25">
					Noticias relacionadas
				</h4>

				<!-- Row -->
				<div class="pi-row">

				<?php

					$comentarios = $articulo->comentarios;
				?>


				<?php foreach ($articulosrelacionados as $articulo) {

					$texto = $articulo->texto;
					$archivos = DB::table('archivos')
						->where('padre', '=', 'articulo')
						->where('padre_id', '=', $articulo->id)
						->first();

					if (preg_match('/^.{1,90}\b/s', $articulo->texto, $match))
					{ $texto = $match[0]; }
					$categoria = Categoria::find($articulo->categorias_id);





					?>

					<!-- Col 4 -->
					<div class="pi-col-xs-4">
						<!-- Post item -->
						<div class="pi-img-w pi-img-round-corners pi-img-shadow">
							<a href="/articulos/show/{{ $articulo->url_seo }}">
							<?php if (count($archivos)>0 )  { ?>
										<img src="/uploads/crop/{{ $archivos->archivo }}" alt="">
							<?php } ?>

							<span class="pi-img-overlay pi-img-overlay-white">
							</span>
							</a>
						</div>

						<h2 class="h5 pi-margin-bottom-5">
							<a href="/articulos/show/{{ $articulo->url_seo }}" class="pi-link-dark">{{$articulo->articulo}}</a>
						</h2>
						<ul class="pi-meta pi-margin-bottom-10">
							<li><i class="icon-clock"></i>{{$articulo->created_at}}</li>
							<li><i class="icon-eyes"></i><a href="#">{{$categoria->categoria}}></li>
						</ul>
						<p>
							{{$texto}}... <a href="/articulos/show/{{$articulo->url_seo}}" class="pi-italic">Leer más</a>
						</p>
						<!-- End post item -->
					</div>
					<!-- End col 4 -->



					<?php } ?>


				</div>
				<!-- End row -->


				<?php if ($comentarios == 'si') { ?>

								<hr class="pi-divider pi-divider-dashed pi-divider-big">

								<h4 class="pi-has-bg pi-weight-700 pi-uppercase pi-letter-spacing pi-margin-bottom-20">
									Comentarios
								</h4>
								<div id="disqus_thread"></div>
								<script type="text/javascript">
									/* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
									var disqus_shortname = 'virasorovirtual'; // required: replace example with your forum shortname

									/* * * DON'T EDIT BELOW THIS LINE * * */
									(function() {
										var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
										dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
										(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
									})();
								</script>
								<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
								<a href="http://disqus.com" class="dsq-brlink">comments powered by <span class="logo-disqus">Disqus</span></a>


				<?php } ?>

			</div>

			<div class="pi-sidebar pi-col-sm-3">

				<!-- Search -->
				<div class="pi-sidebar-block pi-padding-bottom-60">



					<!-- Put the following javascript before the closing </head> tag. -->
					<script>
					  (function() {
					    var cx = '010195671577222309523:zef_etpvv30';
					    var gcse = document.createElement('script'); gcse.type = 'text/javascript'; gcse.async = true;
					    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
					        '//www.google.com/cse/cse.js?cx=' + cx;
					    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(gcse, s);
					  })();
					</script>

					<!-- Place this tag where you want both of the search box and the search results to render -->
					<gcse:search></gcse:search>
				</div>
				<!-- End search -->

				<!-- Tweets -->
				<div class="pi-sidebar-block pi-padding-bottom-40">
					<h3 class="h6 pi-uppercase pi-weight-700 pi-letter-spacing pi-has-bg pi-margin-bottom-20">
						Ultimos Tweets
					</h3>
						<a class="twitter-timeline" href="https://twitter.com/virasorovirtual" data-widget-id="457138837286699008">Tweets por @virasorovirtual</a>
						<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
					</div>
				<!-- End tweets -->

				<!-- Flickr photos -->
				<div class="pi-sidebar-block pi-padding-bottom-40">
					<h3 class="h6 pi-uppercase pi-weight-700 pi-letter-spacing pi-has-bg pi-margin-bottom-20">
						Facebook
					</h3>
					<div class='fb-facepile' data-href='http://www.facebook.com/virasorovirtual' data-size='large' data-max-rows='10' data-width='300' data-colorscheme='dark'></div>
				</div>
				<!-- End flickr photos -->

			</div>

		</div>

	</div>
</div>

<!-- - - - - - - - - - END SECTION - - - - - - - - - -->




@stop

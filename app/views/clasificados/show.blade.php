@extends('layouts.default')
@section('content')

<link rel="stylesheet" type="text/css" href="/css/boxes.css"/>
<link rel="stylesheet" type="text/css" href="/css/shadows.css"/>



<?php
			$clasificadoscategoria = Clasificadoscategoria::find($clasificado->clasificadoscategorias_id);
			$archivo = DB::table('archivos')
			->where('padre', '=', 'clasificado')
			->where('padre_id', '=', $clasificado->id)
			->first();

?>



<div id="page"><!-- - - - - - - - - - SECTION - - - - - - - - - -->
<div class="pi-section-w pi-section-white">
	<div class="pi-section pi-padding-bottom-80">

		<div class="pi-text-center">
			<h1 class="pi-uppercase pi-weight-700 pi-has-border pi-has-tall-border pi-has-short-border pi-margin-bottom-70">
				{{ $clasificado->clasificado }}
			</h1>
		</div>

		<!-- Row -->
		<div class="pi-row">

		<!-- Row -->
		<div class="pi-row">

			<!-- Col 8 -->
			<div class="pi-col-sm-8">

				<!-- Box -->
				<div class="pi-shadow-effect7">
					<div class="pi-box pi-border pi-round pi-border-top pi-text-center">


						<?php if (count($archivo)) { ?>

						<img src="/uploads/big/{{ $archivo->archivo }}" alt="" />

						<?php } else { ?>
								<h2 class="pi-weight-600">
									No se ha subido una fotografia
								</h2>

							<br><br>

						<?php } ?>




					</div>
				</div>
				<!-- End box -->

			</div>
			<!-- End col 8 -->

			<!-- Col 4 -->
			<div class="pi-col-sm-4">

				<!-- Box -->
				<div class="pi-shadow-effect7">
				<div class="pi-box pi-border pi-round pi-border-top">

					<h5 class="pi-weight-600">
						<b>Categoria: </b>{{$clasificadoscategoria->clasificadoscategoria}}<br><br>
						<b>Fecha : </b>{{$clasificado->created_at}}<br><br>
						<b>Visitas : </b>{{$clasificado->visitas}}<br>
						<b>Telefono : </b>{{$clasificado->telefono}}<br>
					</h5>
					<br><br>
					<h2 class="pi-weight-600">
						Precio: $ {{$clasificado->precio}}
					</h2>
					<br><br>


				</div>
				</div>
				<!-- End box -->

			</div>
			<!-- End col 4 -->

		</div>
		<!-- End row -->

		<hr class="pi-divider-gap-30">


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



	</div>
</div>
<!-- - - - - - - - - - END SECTION - - - - - - - - - --></div>






@stop

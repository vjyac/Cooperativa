@extends('layouts.default')

@section('content')

<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
<!-- <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
-->

<!-- <script src="/js/jquery-2.0.3.min.js"></script>

<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script> -->



		<link rel="stylesheet" type="text/css" href="/css/bootstrap-wysihtml5.css" />
		<script src="/js/wysihtml5-0.3.0.js"></script>
		<script src="/js/jquery-1.7.2.min.js"></script>
		<script src="/js/bootstrap.min.js"></script>
		<script src="/js/bootstrap3-wysihtml5.js"></script>



<h2>Archivos</h2>
<header class="panel-heading"><b>Articulo: </b>{{$articulo->articulo}}</header>

			{{ Form::open(array('route' => 'archivos.store', 'files' => true, 'class'=>'panel-body wrapper-lg', 'enctype' => 'multipart/form-data')) }}

				{{ Form::hidden('padre_id' , $padre_id, array('id' =>'padre_id')) }}
				{{ Form::hidden('padre' , $padre, array('id' =>'padre')) }}

	<div class="form-group">
			<label>Archivo</label>

				<input name="file" type="file"/>

		</div>


		<div class="form-group">

		<label>Descripcion</label>
		<div class="hero-unit" style="margin-top:10px">
				<textarea class="form-control textarea " name="descripcion" id="descripcion" style="width: 810px; height: 150px"></textarea>
		</div>
	</div>


			<br>
			{{ Form::submit('Agregar', array('class' => 'btn btn-primary')) }}





	<?php if (count($archivos)>0 )  { ?>
							<section class="panel panel-default">

								<div class="table-responsive">
									<table class="table table-striped b-t b-light text-sm">
										<thead>

											<tr>
												<th>Archivo</th>
												<th>Descipcion</th>
												<th>Accion</th>
											</tr>
										</thead>
										<tbody>

												<?php foreach ($archivos as $archivo) {

														echo "<tr>";
																echo "<td>" . $archivo->archivo . "</td>";
																echo "<td>" . $archivo->descripcion . "</td>";
																echo "<td>" ;

														echo "<a href='/archivos/" . $archivo->id . "/delete' class='btn btn-xs'>Eliminar</a> ";

														print "</td>";
														print "</tr>";

												} ?>

									</tbody>
								</table>
							</div>

						</section>

		<?php } ?>



<script>
		$('.textarea').wysihtml5();
</script>

<script type="text/javascript" charset="utf-8">
		$(prettyPrint);
</script>



@stop

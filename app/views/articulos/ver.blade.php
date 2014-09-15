@extends('layouts.default')

@section('content')

<link rel="stylesheet" type="text/css" href="/css/tables.css"/>

<div id="page"><!-- - - - - - - - - - SECTION - - - - - - - - - -->
<div class="pi-section-w pi-section-white piICheck piStylishSelect">
	<div class="pi-section pi-padding-bottom-80">

		<div class="pi-text-center pi-margin-bottom-60">
			<h1 class="pi-uppercase pi-weight-700 pi-has-border pi-has-tall-border pi-has-short-border pi-margin-bottom-70">
				Articulos
			</h1>
		</div>



	<?php
		echo "<a href='/articulos/create' class='btn pi-btn-base pi-btn-small'>Nuevo articulo</a><br><br>";

		if (count($articulos)>0 )  {


?>

										<div class="pi-responsive-table-sm">
													<table class="pi-table pi-table-complex pi-table-hovered pi-round pi-table-shadow pi-table-all-borders">

														<!-- Table head -->
														<thead>

													<!-- Table row -->
													<tr>
														<th style="width: 25%;">
															Titular
														</th>
														<th style="width: 40%;">
															Copete
														</th>
														<th style="width: 10%;">
															Estado
														</th>
														<th style="width: 20%;">
															Accion
														</th>
													</tr>
													<!-- End table row -->

												</thead>
												<!-- End table head -->

												<!-- Table body -->
												<tbody>

												<?php

											foreach ($articulos as $articulo)
												{

														$categoria = Categoria::find($articulo->categorias_id);

														$texto = $articulo->texto;
														if (preg_match('/^.{1,260}\b/s', $articulo->texto, $match))
														{
																$texto = $match[0];
														}


														echo "<tr>";
												    echo "<td>" . $articulo->articulo . "</td>";
												    echo "<td>" . $texto . "</td>";
												    echo "<td>" . $articulo->estado . "</td>";
														echo "<td>" ;

														echo "<a href='/articulos/" . $articulo->id . "/publicar' class='btn pi-btn-base pi-btn-small'>Publicar</a> ";
														echo "<a href='/articulos/" . $articulo->id . "/edit' class='btn pi-btn-base pi-btn-small'>Editar</a> ";
														echo "<a href='/articulos/" . $articulo->id . "/archivos/articulo' class='btn pi-btn-base pi-btn-small'>Archivos</a> ";
														echo "<a href='/articulos/" . $articulo->id . "/delete' class='btn pi-btn-base pi-btn-small'>Eliminar</a> ";


														print "</td>";
														print "</tr>";



												}


											?>


											</tbody>
											<!-- End table body -->

										</table>
									</div>
									<!-- End table -->

									<div class="pi-pagenav pi-text-center">
										{{ $articulos->links()}}
									</div>




							</footer>
						</section>
		<?php

			}

		?>

</div>
</div>
</div>

@stop

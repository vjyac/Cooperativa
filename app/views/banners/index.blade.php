@extends('layouts.default')

@section('content')
<link rel="stylesheet" type="text/css" href="/css/tables.css"/>


<div id="page"><!-- - - - - - - - - - SECTION - - - - - - - - - -->
<div class="pi-section-w pi-section-white piTooltips">
	<div class="pi-section pi-padding-bottom-80">

		<div class="pi-text-center">
			<h1 class="pi-uppercase pi-weight-700 pi-has-border pi-has-tall-border pi-has-short-border pi-margin-bottom-70">
				{{ $title }}
			</h1>
		</div>

<a href='/banners/create' class='btn pi-btn-orange pi-btn-small'>Crear nuevo banner</a><br>

<?php if (count($banners)>0 )  { ?>




									<table class="pi-table pi-table-hovered pi-table-zebra">

										<thead>

											<tr>
												<th>Empresa</th>
												<th>File</th>
												<th>Link</th>
												<th>Posicion</th>
												<th>Activo</th>
												<th align="center">Accion</th>
											</tr>
										</thead>
										<tbody>

												<?php

											foreach ($banners as $banner)
												{


														echo "<tr>";
												        echo "<td>" . $banner->empresa . "</td>";
																echo "<td>" . $banner->file . "</td>";
																echo "<td>" . $banner->link . "</td>";
																echo "<td>" . $banner->posicion . "</td>";
																echo "<td>" . $banner->activo . "</td>";
												        echo "<td align='center'>" ;

														echo "<a href='/banners/" . $banner->id . "/edit' class='btn pi-btn-orange pi-btn-small'>Editar</a> ";
														echo "<a href='/banners/" . $banner->id . "/delete' class='btn pi-btn-orange pi-btn-small'>Eliminar</a> ";

														print "</td>";
														print "</tr>";


												}


											?>

									</tbody>
								</table>

									{{ $banners->links()}}

		<?php

			}

		?>


</div>
</div>
</div>

@stop

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

<a href='/pages/create' class='btn pi-btn-orange pi-btn-small'>Crear nueva pagina</a><br>

<?php if (count($pages)>0 )  { ?>




									<table class="pi-table pi-table-hovered pi-table-zebra">

										<thead>

											<tr>
												<th>Pagina</th>
												<th align="center">Accion</th>
											</tr>
										</thead>
										<tbody>

												<?php

											foreach ($pages as $page)
												{


														echo "<tr>";
												        echo "<td>" . $page->page . "</td>";
												        echo "<td align='center'>" ;

														echo "<a href='/pages/" . $page->id . "/edit' class='btn pi-btn-orange pi-btn-small'>Editar</a> ";

														echo "<a href='/pages/" . $page->url_seo . "' class='btn pi-btn-orange pi-btn-small'>Ver</a> ";
														echo "<a href='/pages/" . $page->id . "/delete' class='btn pi-btn-orange pi-btn-small'>Eliminar</a> ";

														print "</td>";
														print "</tr>";


												}


											?>

									</tbody>
								</table>

									{{ $pages->links()}}

		<?php

			}

		?>


</div>
</div>
</div>

@stop

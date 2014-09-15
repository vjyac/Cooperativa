@extends('layouts.default')

@section('content')

<link rel="stylesheet" type="text/css" href="/css/tables.css"/>

<div id="page"><!-- - - - - - - - - - SECTION - - - - - - - - - -->
<div class="pi-section-w pi-section-white piICheck piStylishSelect">
	<div class="pi-section pi-padding-bottom-80">

		<div class="pi-text-center pi-margin-bottom-60">
			<h1 class="pi-uppercase pi-weight-700 pi-has-border pi-has-tall-border pi-has-short-border pi-margin-bottom-70">
				Mensajes desde Contactenos
			</h1>
		</div>


	<?php


		if (count($contactos)>0 )  { ?>

				<div class="pi-responsive-table-sm">
							<table class="pi-table pi-table-complex pi-table-hovered pi-round pi-table-shadow pi-table-all-borders">

										<thead>

											<tr>
												<th>Nombre</th>
												<th>Email</th>
												<th>Telefono</th>
												<th>Contacto</th>
												<th>Accion</th>
											</tr>
										</thead>
										<tbody>

												<?php

											foreach ($contactos as $contacto)
												{



														echo "<tr>";
												        echo "<td>" . $contacto->nombre . "</td>";
																echo "<td>" . $contacto->email . "</td>";
																echo "<td>" . $contacto->telefono . "</td>";
												        echo "<td>" . $contacto->contacto . "</td>";
												        echo "<td>" ;

														echo "<a href='/contactos/" . $contacto->id . "/delete' class='btn btn-xs'>Eliminar</a> ";

														print "</td>";
														print "</tr>";


												}


											?>

									</tbody>
								</table>
							</div>
						</div>

							<footer class="panel-footer">

								<div class="row">
									<div class="col-sm-4 hidden-xs">
										<!-- <select class="input-sm form-control input-s-sm inline">
											<option value="0">Bulk action</option>
											<option value="1">Delete selected</option>
											<option value="2">Bulk edit</option>
											<option value="3">Export</option>
										</select> -->
									</div>
									<div class="col-sm-4 text-center">
										<!-- <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small> -->
									</div>
									<div class="col-sm-4 text-right text-center-xs">

									{{ $contactos->links()}}

									</div>
								</div>

		<?php } ?>

</div>
</div>
</div>
@stop

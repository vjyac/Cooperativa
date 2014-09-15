@extends('layouts.default')

@section('content')

<?php if (count($articulos)>0 )  { ?>
							<section class="panel panel-default">
								<header class="panel-heading">{{ $title }}</header>

								<div class="table-responsive">
									<table class="table table-striped b-t b-light text-sm">
										<thead>

											<tr>
												<th>Articulo</th>
												<th>Rubro</th>
												<th>Proveedor</th>
												<th>Precio Base</th>
												<th>Utilidad</th>
												<th>Iva</th>
												<th>Precio Precio Publico</th>
												<th>Accion</th>
											</tr>
										</thead>
										<tbody>

												<?php

											foreach ($articulos as $articulo)
												{


														$rubro = Rubro::find($articulo->rubros_id);
														$proveedor = Proveedor::find($articulo->proveedors_id);

														echo "<tr>";
												        echo "<td>" . $articulo->articulo . "</td>";
												        echo "<td>" . $rubro->rubro . "</td>";
												        echo "<td>" . $proveedor->proveedor . "</td>";
												        echo "<td>" . $articulo->precio_base . "</td>";
												        echo "<td>" . $articulo->utilidad . "</td>";
												        echo "<td>" . $articulo->iva . "</td>";
												        echo "<td>" . $articulo->precio_publico . "</td>";
												        echo "<td>" ;

														echo "<a href='/articulos/" . $articulo->id . "/edit' class='btn btn-xs btn-primary'>Editar</a> ";

														echo "<a href='/articulos/" . $articulo->id . "' class='btn btn-xs btn-info'>Ver</a> ";

														print "</td>";
														print "</tr>";


												}


											?>

									</tbody>
								</table>
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

									{{ $articulos->links()}}

									</div>
								</div>

							</footer>
						</section>
		<?php

			}

		?>


@stop

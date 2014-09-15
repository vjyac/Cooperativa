@extends('layouts.default')
@section('content')

<link rel="stylesheet" type="text/css" href="/css/tables.css"/>


			<div id="page"><!-- - - - - - - - - - SECTION - - - - - - - - - -->

			<div class="pi-section-w pi-section-white">
			<div class="pi-section">

			<div class="pi-text-center pi-margin-bottom-50">
				<h1 class="pi-uppercase pi-weight-700 pi-has-border pi-has-tall-border pi-has-short-border">
					<?php
						$clasificadoscategoria = Clasificadoscategoria::find($clasificadoscategorias_id);
						echo $clasificadoscategoria->clasificadoscategoria;
					?>

				</h1>

				<a href="/clasificados/create" class="btn pi-btn-orange pi-btn-bigger">
					Agrega tu clasificado gratis !
				</a>


			</div>

@if (count($clasificados)>0 )

<!-- Table -->
<div class="pi-responsive-table-sm">
	<table class="pi-table pi-table-hovered pi-table-zebra">

		<!-- Table head -->
		<thead>

			<!-- Table row -->
			<tr>
				<th style="width: 240px;">
						Foto
				</th>
				<th>
					Clasificado
				</th>
				<th>
					Importe
				</th>
				<th>
					Ofertar
				</th>
			</tr>
			<!-- End table row -->

		</thead>
		<!-- End table head -->

		<!-- Table body -->
		<tbody>





											@foreach ($clasificados as $clasificado)
												<?php


													$archivo = DB::table('archivos')
														->where('padre', '=', 'clasificado')
														->where('padre_id', '=', $clasificado->id)
														->first();


													?>




							<!-- Table row -->
							<tr>
								<td>



										@if (count($archivo))

											<img src="/uploads/crop/{{ $archivo->archivo }}" alt="" />

										@endif
								</td>
								<td align="left">
										{{ $clasificado->clasificado }}
								</td>

								<td align="right">
											{{ $clasificado->precio }}

								</td>
								<td align="center">
										<a href="/clasificados/{{ $clasificado->id }}" class="btn pi-btn-lime pi-btn-small">
											Ver
										</a>

								</td>
							</tr>
							<!-- End table row -->


											@endforeach



		</tbody>
		<!-- End table body -->


			</table>
		</div>
		<!-- End table -->

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

		{{ $clasificados->links()}}

		</div>
	</div>

</footer>



@else
		<h3 class="text-center-xs">
					No hay clasificados cargados en esta categoria
		</h3>

@endif


</div>
</div>

<!-- - - - - - - - - - END SECTION - - - - - - - - - --></div>


@stop

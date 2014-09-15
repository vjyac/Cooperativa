@extends('layouts.default')
@section('content')




<div id="page"><!-- - - - - - - - - - SECTION - - - - - - - - - -->

<!-- Title bar -->
<div class="pi-section-w pi-section-base pi-section-base-gradient">
	<div class="pi-texture" style="background: url(img/hexagon.png) repeat;"></div>
	<div class="pi-section" style="padding: 30px 40px 26px;">

		<div class="pi-row">
			<div class="pi-col-sm-4 pi-center-text-xs">
				<h1 class="h2 pi-weight-300 pi-margin-bottom-5">Perfil</h1>
			</div>
		</div>
	</div>
</div>
<!-- End title bar -->

<!-- - - - - - - - - - END SECTION - - - - - - - - - -->

<!-- - - - - - - - - - SECTION - - - - - - - - - -->

<div class="pi-section-w pi-section-white">
	<div class="pi-section pi-padding-bottom-20">

		<!-- Row -->
		<div class="pi-row">

			<!-- Col 10 -->
			<div class="pi-col-sm-10 pi-col-sm-offset-1 pi-padding-bottom-60">
				<p class="lead-30 pi-text-dark pi-text-center">
					Ya eres miembro de nuestra red
				</p>
			</div>
			<!-- End col 10 -->
		</div>			

<div class="pi-row">

		<h3>Tus Datos:</h3>

				@if ($user->first_name)
					<p><strong>Nombre:</strong> {{ $user->first_name }} </p>
			@endif
			@if ($user->last_name)
					<p><strong>Apellido:</strong> {{ $user->last_name }} </p>
			@endif
				<p><strong>Email: </strong> {{ $user->email }}</p>


			<p><em>Fecha creacion Perfil: {{ $user->created_at }}</em></p>
			<p><em>Modificados: {{ $user->updated_at }}</em></p>

			<a href="/users/{{$user->id}}/edit" class="btn pi-btn-orange pi-btn-bigger">Editar</a>

			<br><br>
	<h3>Grupos a los que eres miembro:</h3>
	<?php $userGroups = $user->getGroups(); ?>
	<div>
			<ul>
				@if (count($userGroups) >= 1)
					@foreach ($userGroups as $group)
					<li>{{ $group['name'] }}</li>
				@endforeach
			@else
				<li>{{trans('groups.notfound')}}</li>
			@endif
			</ul>
	</div>




		</div>
	</div>
</div>





@stop

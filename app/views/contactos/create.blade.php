@extends('layouts.default')

@section('content')


<div id="page"><!-- - - - - - - - - - SECTION - - - - - - - - - -->
<div class="pi-section-w pi-section-white piICheck piStylishSelect">
	<div class="pi-section pi-padding-bottom-80">

		<div class="pi-text-center pi-margin-bottom-60">
			<h1 class="pi-uppercase pi-weight-700 pi-has-border pi-has-tall-border pi-has-short-border pi-margin-bottom-70">
				Participá
			</h1>
<h3>
	Vos también podés formar parte del futuro, <br>
	Mandanos tus proyectos, contanos tus ideas <br>
	y comentanos tus inquietudes:
</h3>

		</div>





<!-- Row -->
<div class="pi-row">



{{ Form::open(array('route' => 'contactos.store', 'class' => 'panel-body wrapper-lg')) }}

<!-- Col 6 -->
<div class="pi-col-xs-6">
		<!-- First name form -->
		<div class="form-group">
			<label for="titular">Nombre</label>

			<div class="pi-input-with-icon">
				<div class="pi-input-icon"><i class="icon-pencil"></i></div>
				{{ Form::text('nombre', '', array('class' => 'form-control', 'id' => 'nombre', 'placeholder' => 'Ingrese el nombre')) }}
			</div>
		</div>
		<!-- End first name form -->

		<!-- First email form -->
		<div class="form-group">
			<label for="titular">Email</label>

			<div class="pi-input-with-icon">
				<div class="pi-input-icon"><i class="icon-pencil"></i></div>
				{{ Form::text('email', '', array('class' => 'form-control', 'id' => 'email', 'placeholder' => 'Ingrese el email')) }}
			</div>
		</div>
		<!-- End first email form -->

		<!-- First email form -->
		<div class="form-group">
			<label for="titular">Telefono</label>

			<div class="pi-input-with-icon">
				<div class="pi-input-icon"><i class="icon-pencil"></i></div>
				{{ Form::text('telefono', '', array('class' => 'form-control', 'id' => 'telefono', 'placeholder' => 'Ingrese un telefono')) }}
			</div>
		</div>
		<!-- End first email form -->

</div>
<!-- Col 6 -->
<div class="pi-col-xs-8">

		<div class="hero-unit" style="margin-top:40px">
				<textarea class="form-control textarea " name="contacto" id="texto" style="width: 810px; height: 150px"></textarea>
		</div>
	<br>	<br>
		{{ Form::submit('Agregar', array('class' => 'btn pi-btn-base')) }}
</div>




</div>

</div>
</div>
</div>




@stop

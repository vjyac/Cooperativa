@extends('layouts.default')
@section('content')

<div id="page"><!-- - - - - - - - - - SECTION - - - - - - - - - -->
<div class="pi-section-w pi-section-white piICheck piStylishSelect">
	<div class="pi-section pi-padding-bottom-80">

		<div class="pi-text-center pi-margin-bottom-60">
			<h1 class="pi-uppercase pi-weight-700 pi-has-border pi-has-tall-border pi-has-short-border pi-margin-bottom-70">
				Articulos
			</h1>
		</div>

<h4>{{ $group['name'] }}</h4>
<div class="well clearfix">
	<div class="col-md-10">
	    <strong>{{trans('groups.permisions')}}:</strong>
	    <ul>
	    	@foreach ($group->getPermissions() as $key => $value)
	    		<li>{{ ucfirst($key) }}</li>
	    	@endforeach
	    </ul>
	</div>
	<div class="col-md-2">
		<button class="btn btn-primary" onClick="location.href='{{ action('GroupController@edit', array($group->id)) }}'">{{trans('pages.actionedit')}}</button>
	</div>
</div>



</div>
</div>
@stop

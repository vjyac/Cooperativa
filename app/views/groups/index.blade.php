@extends('layouts.default')
@section('content')

<div id="page"><!-- - - - - - - - - - SECTION - - - - - - - - - -->
<div class="pi-section-w pi-section-white piICheck piStylishSelect">
  <div class="pi-section pi-padding-bottom-80">

    <div class="pi-text-center pi-margin-bottom-60">
      <h1 class="pi-uppercase pi-weight-700 pi-has-border pi-has-tall-border pi-has-short-border pi-margin-bottom-70">
        {{trans('pages.listwith')}} {{trans('groups.groups')}}
      </h1>
    </div>

<div class="pi-responsive-table-sm">
  <table class="pi-table pi-table-hovered pi-table-zebra">
			<thead>
				<th>{{trans('groups.name')}}</th>
				<th>{{trans('groups.permisions')}}</th>
				<th>{{trans('pages.options')}}</th>
			</thead>
			<tbody>
			@foreach ($groups as $group)
				<tr>
					<td><a href="groups/{{ $group->id }}">{{ $group->name }}</a></td>
					<td>{{ (isset($group['permissions']['admin'])) ? '<i class="icon-ok"></i> Admin' : ''}} {{ (isset($group['permissions']['users'])) ? '<i class="icon-ok"></i> Usuarios' : ''}}</td>
					<td>
						<button class="btn pi-btn-base pi-btn-small" onClick="location.href='{{ action('GroupController@edit', array($group->id)) }}'">{{trans('pages.actionedit')}}</button>
					 	<button class="btn pi-btn-base pi-btn-small action_confirm {{ ($group->id == 2) ? 'disabled' : '' }}" type="button" data-method="delete" href="{{ URL::to('groups') }}/{{ $group->id }}">{{trans('pages.actiondelete')}}</button>
					 </td>
				</tr>
			@endforeach
			</tbody>
		</table>
	</div>
  <br><br>
	 <button class="btn pi-btn-base pi-btn-small" onClick="location.href='{{ URL::to('groups/create') }}'">{{trans('groups.create')}}</button>

</div>
</div>

@stop

@extends('layouts.default')
@section('content')
<div id="page"><!-- - - - - - - - - - SECTION - - - - - - - - - -->
<div class="pi-section-w pi-section-white piICheck piStylishSelect">
  <div class="pi-section pi-padding-bottom-80">

    <div class="pi-text-center pi-margin-bottom-60">
      <h1 class="pi-uppercase pi-weight-700 pi-has-border pi-has-tall-border pi-has-short-border pi-margin-bottom-70">
        Usuarios
      </h1>
    </div>


<div class="pi-responsive-table-sm">
  <table class="pi-table pi-table-hovered pi-table-zebra">

			<thead>
				<th>{{trans('pages.user')}}</th>
				<th>{{trans('pages.status')}}</th>
				<th>{{trans('pages.options')}}</th>
			</thead>
			<tbody>
				@foreach ($users as $user)
					<tr>
						<td><a href="{{ action('UserController@show', array($user->id)) }}">{{ $user->email }}</a></td>
						<td>@if ($user->status=='Active')
							{{trans('pages.active')}}
						 @else
						 	{{trans('pages.notactive')}}
						 @endif
						 </td>

						<td>
							<button class="btn pi-btn-base pi-btn-small" type="button" onClick="location.href='{{ action('UserController@edit', array($user->id)) }}'">{{trans('pages.actionedit')}}</button>
							@if ($user->status != 'Suspended')
								<button class="btn pi-btn-base pi-btn-small" type="button" onClick="location.href='{{ route('suspendUserForm', array($user->id)) }}'">{{trans('pages.actionsuspend')}}</button>
							@else
								<button class="btn pi-btn-base pi-btn-small" type="button" onClick="location.href='{{ action('UserController@unsuspend', array($user->id)) }}'">{{trans('pages.actionunsuspend')}}</button>
							@endif
							@if ($user->status != 'Banned')
								<button class="btn pi-btn-base pi-btn-small" type="button" onClick="location.href='{{ action('UserController@ban', array($user->id)) }}'">{{trans('pages.actionban')}}</button>
							@else
								<button class="btn pi-btn-base pi-btn-small" type="button" onClick="location.href='{{ action('UserController@unban', array($user->id)) }}'">{{trans('pages.actionunban')}}</button>
							@endif

							<button class="btn pi-btn-base pi-btn-small action_confirm" href="{{ action('UserController@destroy', array($user->id)) }}" data-token="{{ Session::getToken() }}" data-method="delete">{{trans('pages.actiondelete')}}</button></td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
  </div>
</div>
@stop



                      </tbody>
                      <!-- End table body -->

                    </table>
                  </div>
                  <!-- End table -->

</div>
</div>
</div>

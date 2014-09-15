@extends('layouts.default')
@section('content')

<div class="pi-section-w pi-section-white piICheck piStylishSelect" style="background: #f4f6f6;">
	<div class="pi-section pi-padding-bottom-60">

		<div class="pi-text-center pi-margin-bottom-50">
			<h1 class="pi-uppercase pi-weight-700 pi-has-border pi-has-tall-border pi-has-short-border">
				Ingresar
			</h1>
		</div>

		<!-- Row -->
		<div class="pi-row">

			<!-- Col 4 -->
			<div class="pi-col-md-4 pi-col-md-offset-4 pi-col-sm-6 pi-col-sm-offset-3 pi-col-xs-8 pi-col-xs-offset-2">

				<!-- Box -->
				<div class="pi-box pi-round pi-shadow-15">
          {{ Form::open(array('action' => 'SessionController@store')) }}
					<!-- Email form -->
					<div class="form-group">
						<div class="pi-input-with-icon">
							<div class="pi-input-icon"><i class="icon-mail"></i></div>
							{{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => trans('users.email'), 'autofocus')) }}
						</div>
					</div>
					<!-- End email form -->

					<!-- Password form -->
					<div class="form-group">
						<div class="pi-input-with-icon">
							<div class="pi-input-icon"><i class="icon-lock"></i></div>
							{{ Form::password('password', array('class' => 'form-control', 'placeholder' => trans('users.pword')))}}
						</div>
					</div>
					<!-- End password form -->

					<p class="pi-pull-right pi-small-text">
						<a href="{{ route('forgotPasswordForm') }}">
							{{trans('pages.password_reset')}}?
						</a>
					</p>

					<!-- Checkbox -->
					<div class="checkbox">
						<label class="pi-small-text">
							{{ Form::checkbox('rememberMe', 'rememberMe') }} {{trans('users.remember')}}?
						</label>
					</div>
					<!-- End checkbox -->

					<!-- Submit button -->
					<p>
            {{ Form::submit(trans('pages.login'), array('class' => 'btn pi-btn-base pi-btn-wide pi-weight-600'))}}
					</p>
					<!-- End submit button -->
          {{ Form::close() }}
				</div>
				<!-- End box -->

				<p class="pi-text-center">
					No tienes una cuenta ? <a href="/register" class="pi-weight-600">Registrarse gratis !</a>
				</p>

			</div>
			<!-- End col 4 -->

		</div>
		<!-- End row -->

	</div>



@stop

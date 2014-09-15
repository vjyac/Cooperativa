@extends('layouts.default')
@section('content')

<div id="page"><!-- - - - - - - - - - SECTION - - - - - - - - - -->
<div class="pi-section-w pi-section-white piICheck piStylishSelect" style="background: #f4f6f6;">
  <div class="pi-section pi-padding-bottom-60">

    <div class="pi-text-center pi-margin-bottom-50">
      <h1 class="pi-uppercase pi-weight-700 pi-has-border pi-has-tall-border pi-has-short-border">
        {{trans('users.forgotupword')}}
      </h1>
    </div>

    <!-- Row -->
    <div class="pi-row">

      <!-- Col 4 -->
      <div class="pi-col-md-4 pi-col-md-offset-4 pi-col-sm-6 pi-col-sm-offset-3 pi-col-xs-8 pi-col-xs-offset-2">

        <!-- Box -->
        <div class="pi-box pi-round pi-shadow-15">
          {{ Form::open(array('action' => 'UserController@forgot', 'method' => 'post')) }}
          <!-- Email form -->
          <div class="form-group">
            <div class="pi-input-with-icon">
              <div class="pi-input-icon"><i class="icon-mail"></i></div>
              {{ Form::text('email', null, array('class' => 'form-control', 'placeholder' => trans('users.email'), 'autofocus')) }}
            </div>
          </div>
          <!-- End email form -->

          <!-- Submit button -->
          <p>
            {{ Form::submit(trans('users.resendpword'), array('class' => 'btn pi-btn-base pi-btn-wide pi-weight-600'))}}
          </p>
          <!-- End submit button -->

        </div>
        <!-- End box -->
        {{ Form::close() }}
        <p class="pi-text-center">
          Recuerdas tu contraseña ? <a href="/login" class="pi-weight-600">Ingresar</a>
        </p>

      </div>
      <!-- End col 4 -->

    </div>
    <!-- End row -->

  </div>
</div>




@stop

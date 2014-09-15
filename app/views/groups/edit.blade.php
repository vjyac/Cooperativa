@extends('layouts.default')
@section('content')
<div id="page"><!-- - - - - - - - - - SECTION - - - - - - - - - -->
<div class="pi-section-w pi-section-white piICheck piStylishSelect">
  <div class="pi-section pi-padding-bottom-80">

    <div class="pi-text-center pi-margin-bottom-60">
      <h1 class="pi-uppercase pi-weight-700 pi-has-border pi-has-tall-border pi-has-short-border pi-margin-bottom-70">
          {{trans('pages.actionedit')}} {{trans('groups.group')}}
      </h1>
    </div>



	{{ Form::open(array('action' =>  array('GroupController@update', $group->id), 'method' => 'put')) }}


        <div class="form-group {{ ($errors->has('name')) ? 'has-error' : '' }}">
            {{ Form::text('name', $group->name, array('class' => 'form-control', 'placeholder' => trans('groups.name'))) }}
            {{ ($errors->has('name') ? $errors->first('name') : '') }}
        </div>

        {{ Form::label(trans('groups.permisions')) }}
        <?php
            $permissions = $group->getPermissions();
            if (!array_key_exists('admin', $permissions)) $permissions['admin'] = 0;
            if (!array_key_exists('users', $permissions)) $permissions['users'] = 0;
        ?>

        <div class="form-group">
            <label class="checkbox-inline">
                {{ Form::checkbox('adminPermissions', 1, $permissions['admin'] ) }} Admin
            </label>
            <label class="checkbox-inline">
                {{ Form::checkbox('userPermissions', 1, $permissions['users'] ) }} Users
            </label>
        </div>

        {{ Form::hidden('id', $group->id) }}
        {{ Form::submit(trans('pages.actionedit').' '.trans('groups.group'), array('class' => 'btn pi-btn-base pi-btn-small')) }}

    {{ Form::close() }}

</div>
</div>
</div>

@stop

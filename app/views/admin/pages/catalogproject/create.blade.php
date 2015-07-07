@extends('admin.layouts.layout')

@section('meta')
    {{ Lang::get('catalog.headtitle') }}
@stop

@section('title')
    {{ Lang::get('catalog.add') }}
@stop

@section('content')
    {{ Form::open(array('route' => 'admin.catalog.create', 'files' => true)) }}
        <div class="col-xs-12 col-md-6">
            {{ Form::hidden('user_id', Auth::user()->id) }}
            <div class="form-group">
                {{ Form::label('title', Lang::get('catalog.title'), array('class' => 'control-label')) }}
                {{ Form::text('title', Input::old('title') , array('placeholder' => 'Project titel', 'class' => 'form-control')) }}
                {{ $errors->first('title') }}
            </div>
            <div class="form-group">
                {{ Form::label('description', Lang::get('catalog.content'), array('class' => 'control-label')) }}
                {{ Form::textarea('description', Input::old('description'), array('placeholder' => 'Project omschrijving', 'class' => 'form-control')) }}
                {{ $errors->first('description') }}
            </div>
            <h2>Pictures</h2>
            <div class="form-group">
                {{ Form::label('pictures', Lang::get('catalog.picture'), array('class' => 'control-label')) }}
                {{ Form::file('pictures[]', array('multiple' => true)) }}
                {{ $errors->first('picture') }}
            </div>
        </div>
        <div class="col-xs-12 col-md-6">
            <h3>Details</h3>
            <div class="form-group">
                {{ Form::text('customer', null , array('placeholder' => 'Klant', 'class' => 'form-control')) }}
                {{ $errors->first('customer') }}
            </div>
            <div class="form-group">
                {{ Form::text('role', null , array('placeholder' => 'Rol / Functie', 'class' => 'form-control')) }}
                {{ $errors->first('role') }}
            </div>
            <div class="form-group">
                {{ Form::text('location', null , array('placeholder' => 'Locatie', 'class' => 'form-control')) }}
                {{ $errors->first('location') }}
            </div>
            <div class="form-group">
                {{ Form::label('start-month', Lang::get('catalog.start'), array('class' => 'control-label')) }}
                <div class="row">
                    <div class="col-xs-4">
                        {{ Form::selectMonth('start-month', null, array('placeholder' => 'Start', 'class' => 'form-control'))}}
                    </div>
                    <div class="col-xs-4">
                        {{ Form::selectYear('start-year', 2015, 1990, 2015, array('placeholder' => 'End', 'class' => 'form-control'))}}
                    </div>
                    <div class="col-xs-4">&nbsp;</div>
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('end-month', Lang::get('catalog.end'), array('class' => 'control-label')) }}
                <div class="row">
                    <div class="col-xs-4">
                        {{ Form::selectMonth('end-month', null, array('placeholder' => 'Start', 'class' => 'form-control'))}}
                    </div>
                    <div class="col-xs-4">
                        {{ Form::selectYear('end-year', 2015, 1990, 2015, array('placeholder' => 'End', 'class' => 'form-control'))}}
                    </div>
                    <div class="col-xs-4">
                        {{ Form::checkbox('not-ended') }} {{ Lang::get('catalog.notended') }}
                    </div>
                </div>
            </div>
            <div class="form-group">
                {{ Form::button(Lang::get('admin.action_save'), array('class' => 'btn btn-primary', 'type' => 'submit')) }}
                <a href="{{ URL::route('admin.catalog.index') }}">{{ Lang::get('admin.action_cancel') }}</a>
            </div>
        </div>
    {{ Form::close() }}
@stop
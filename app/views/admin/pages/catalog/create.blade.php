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
                {{ Form::text('title', Input::old('title') , array('placeholder' => 'Pagina titel', 'class' => 'form-control')) }}
                {{ $errors->first('title') }}
            </div>
            <div class="form-group">
                {{ Form::label('description', Lang::get('catalog.content'), array('class' => 'control-label')) }}
                {{ Form::textarea('description', Input::old('description'), array('placeholder' => 'Inhoud van de pagina', 'class' => 'form-control')) }}
                {{ $errors->first('description') }}
            </div>
            <h2>Pictures</h2>
            <div class="form-group">
                {{ Form::label('pictures', Lang::get('catalog.picture'), array('class' => 'control-label')) }}
                {{ Form::file('pictures[]', array('multiple' => true)) }}
                {{ $errors->first('picture') }}
            </div>
            <div class="form-group">
                {{ Form::button(Lang::get('admin.action_save'), array('class' => 'btn btn-primary', 'type' => 'submit')) }}
                <a href="{{ URL::route('admin.catalog.index') }}">{{ Lang::get('admin.action_cancel') }}</a>
            </div>
        </div>
        <div class="col-xs-12 col-md-6">
            <h3>Details</h3>
            <div class="form-group">
                {{ Form::text('brand', null , array('placeholder' => 'Merk', 'class' => 'form-control')) }}
                {{ $errors->first('brand') }}
            </div>
            <div class="form-group">
                {{ Form::text('type', null , array('placeholder' => 'Model', 'class' => 'form-control')) }}
                {{ $errors->first('type') }}
            </div>
            <div class="form-group">
                {{ Form::text('engine', null , array('placeholder' => 'Uitvoering', 'class' => 'form-control')) }}
                {{ $errors->first('engine') }}
            </div>
            <div class="form-group">
                {{ Form::text('price', null , array('placeholder' => 'Prijs', 'class' => 'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::select('transmission', array('Handgeschakeld' => 'Handgeschakeld', 'Automaat' => 'Automatisch'), null, array('placeholder' => 'Transmissie', 'class' => 'form-control'))}}
                {{ $errors->first('make') }}
            </div>
            <div class="form-group">
                {{ Form::text('make', null , array('placeholder' => 'Bouwjaar', 'class' => 'form-control')) }}
                {{ $errors->first('make') }}
            </div>
            <div class="form-group">
                {{ Form::text('milage', null , array('placeholder' => 'Kilometerstand', 'class' => 'form-control')) }}
                {{ $errors->first('milage') }}
            </div>
            <div class="form-group">
                {{ Form::select('status',
                                    array(
                                        'Available' => 'Beschikbaar',
                                        'Coming soon' => 'Binnenkort beschikbaar',
                                        'Reserved' => 'Gereserveerd',
                                        'Sold' => 'Verkocht'
                                    ), null, array('placeholder' => 'Beschikbaarheid', 'class' => 'form-control'))}}
            </div>
            <div class="form-group">
                {{ Form::text('location', null , array('placeholder' => 'Locatie', 'class' => 'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::text('youtube', null , array('placeholder' => 'Youtube url', 'class' => 'form-control')) }}
            </div>
        </div>
    {{ Form::close() }}
@stop
@extends('admin.layouts.layout')

@section('meta')
    {{ Lang::get('catalog.headtitle') }}
@stop

@section('title')
    {{ Lang::get('catalog.edit') }}
@stop

@section('content')
    {{ Form::model($item, array('route' => array('admin.catalog.update', $item->id), 'files' => true)) }}
        <div class="col-xs-12 col-md-6">
            <div class="form-group">
                {{ Form::label('title', Lang::get('catalog.title'), array('class' => 'control-label')) }}
                {{ Form::text('title', null , array('placeholder' => 'Pagina titel', 'class' => 'form-control')) }}
                {{ $errors->first('title') }}
            </div>
            <div class="form-group">
                {{ Form::label('description', Lang::get('catalog.content'), array('class' => 'control-label')) }}
                {{ Form::textarea('description', null, array('placeholder' => 'Inhoud van de pagina', 'class' => 'form-control')) }}
                {{ $errors->first('description') }}
            </div>
            <h2>Pictures</h2>
            <div class="form-group">
                {{ Form::label('pictures', Lang::get('catalog.picture'), array('class' => 'control-label')) }}
                {{ Form::file('pictures[]', array('multiple' => true)) }}
                {{ $errors->first('picture') }}
            </div>
            {{ Form::hidden('main_pic', $item->project->main_pic, array('id' => 'main_pic')) }}
            <div class="pictures">
                @foreach($item->pictures as $picture)
                    <div class="picture">
                        <img onclick="setMainImage(this, {{$picture->id}});" src="{{ URL::to('/') . '/custom/owner_images/' . $item->id . '/250-' . $picture->url }}" width="250" alt="{{$item->title}}" />
                        <a href="{{ URL::route('admin.catalog.deletepicture', array('id' => $picture->id)) }}">{{ Lang::get('admin.action_delete') }}</a>
                    </div>

                @endforeach
            </div>
            <script type="text/javascript">
                var setMainImage = function(element, value) {
                    var mainPicInput = document.getElementById('main_pic');
                    mainPicInput.value = value;
                    element.className = 'selected';
                }
            </script>
            <style>
                .pictures img {
                    border: 3px solid #FFF;
                }

                .pictures img.selected {
                    border: 9px solid deeppink;
                }
            </style>
        </div>
        <div class="col-xs-12 col-md-6">
            <h3>Details</h3>
            <div class="form-group">
                {{ Form::text('customer', $item->project->customer , array('placeholder' => 'Klant', 'class' => 'form-control')) }}
                {{ $errors->first('customer') }}
            </div>
            <div class="form-group">
                {{ Form::text('role', $item->project->role , array('placeholder' => 'Rol / Functie', 'class' => 'form-control')) }}
                {{ $errors->first('role') }}
            </div>
            <div class="form-group">
                {{ Form::text('location', $item->project->location , array('placeholder' => 'Locatie', 'class' => 'form-control')) }}
                {{ $errors->first('location') }}
            </div>
            <div class="form-group">
                {{ Form::label('start-month', Lang::get('catalog.start'), array('class' => 'control-label')) }}
                <div class="row">
                    <div class="col-xs-4">
                        {{ Form::selectMonth('start-month', explode('-', $item->project->start)[0], array('placeholder' => 'Start', 'class' => 'form-control'))}}
                    </div>
                    <div class="col-xs-4">
                        {{ Form::selectYear('start-year', 2015, 1990, explode('-', $item->project->start)[1], array('placeholder' => 'End', 'class' => 'form-control'))}}
                    </div>
                    <div class="col-xs-4">&nbsp;</div>
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('end-month', Lang::get('catalog.end'), array('class' => 'control-label')) }}
                <div class="row">
                    <div class="col-xs-4">
                        {{ Form::selectMonth('end-month', ($item->project->end != 'present') ? explode('-', $item->project->end)[0] : null, array('placeholder' => 'Start', 'class' => 'form-control'))}}
                    </div>
                    <div class="col-xs-4">
                        {{ Form::selectYear('end-year', 2015, 1990, ($item->project->end != 'present') ? explode('-', $item->project->end)[1]: 2015, array('placeholder' => 'End', 'class' => 'form-control'))}}
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
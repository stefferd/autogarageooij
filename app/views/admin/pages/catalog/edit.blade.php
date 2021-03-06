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
            {{ Form::hidden('main_pic', $item->car->main_pic, array('id' => 'main_pic')) }}
            @if ($item->car->main_pic === 0)
                <p>Er is nog geen hoofdafbeelding gekozen, klik op een afbeelding die op de overzichtpagina getoond moet worden en klik op "Opslaan"</p>
            @endif
            <div class="pictures">
                @foreach($item->pictures as $picture)
                    <img onclick="setMainImage(this, {{$picture->id}});" src="{{ URL::to('/') . '/custom/owner_images/' . $item->id . '/250-' . $picture->url }}" width="250" alt="{{$item->title}}" />
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
                    border: 3px solid #333;
                }
            </style>
            <div class="form-group">
                {{ Form::button(Lang::get('admin.action_save'), array('class' => 'btn btn-primary', 'type' => 'submit')) }}
                <a href="{{ URL::route('admin.catalog.index') }}">{{ Lang::get('admin.action_cancel') }}</a>
            </div>
        </div>
        <div class="col-xs-12 col-md-6">
            <h3>Details</h3>
            <div class="form-group">
                {{ Form::text('brand', $item->car->brand , array('placeholder' => 'Merk', 'class' => 'form-control')) }}
                {{ $errors->first('brand') }}
            </div>
            <div class="form-group">
                {{ Form::text('type', $item->car->type , array('placeholder' => 'Model', 'class' => 'form-control')) }}
                {{ $errors->first('type') }}
            </div>
            <div class="form-group">
                {{ Form::text('engine', $item->car->engine , array('placeholder' => 'Uitvoering', 'class' => 'form-control')) }}
                {{ $errors->first('engine') }}
            </div>
            <div class="form-group">
                {{ Form::text('price', $item->car->price , array('placeholder' => 'Prijs', 'class' => 'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::select('transmission', array('Handgeschakeld' => 'Handgeschakeld', 'Automatisch' => 'Automatisch'), $item->car->transmission, array('placeholder' => 'Transmissie', 'class' => 'form-control'))}}
                {{ $errors->first('make') }}
            </div>
            <div class="form-group">
                {{ Form::text('make', $item->car->make , array('placeholder' => 'Bouwjaar', 'class' => 'form-control')) }}
                {{ $errors->first('make') }}
            </div>
            <div class="form-group">
                {{ Form::text('milage', $item->car->milage , array('placeholder' => 'Kilometerstand', 'class' => 'form-control')) }}
                {{ $errors->first('milage') }}
            </div>
            <div class="form-group">
                {{ Form::select('status',
                    array(
                        'Available' => 'Beschikbaar',
                        'Coming soon' => 'Binnenkort beschikbaar',
                        'Reserved' => 'Gereserveerd',
                        'Sold' => 'Verkocht'
                    ), $item->car->status, array('placeholder' => 'Status', 'class' => 'form-control'))}}
            </div>
            <div class="form-group">
                {{ Form::text('location', $item->car->location , array('placeholder' => 'Locatie', 'class' => 'form-control')) }}
            </div>
            <div class="form-group">
                {{ Form::text('youtube', $item->car->youtube , array('placeholder' => 'Youtube url', 'class' => 'form-control')) }}
            </div>
        </div>
    {{ Form::close() }}
@stop
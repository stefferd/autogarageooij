@extends('front.layouts.home')

@section('meta'){{ $page->title }}@stop

@section('keywords'){{ $page->keywords }}@stop

@section('description'){{ $page->description }}@stop

@section('title'){{ $page->title }}@stop

@section('content')
    {{ $page->content }}
@stop

@section('portfolio')
<ul class="clearing-thumbs small-block-grid-1 medium-block-grid-2 large-block-grid-4">
    @foreach ($portfolioItems as $item)
        <li>
          <div class="article">
            <a href="{{ URL::route('front.portfolio.details', array('id' => $item->id)) }}">
                <img data-caption="{{ $item->title }}" src="/custom/owner_images/{{ $item->id }}/{{ $item->pictures->first()->url }}">
                <div class="overlay">&nbsp;</div>
                <div class="caption">
                    <h5>{{ $item->title }}</h5>
                    <span>{{ $item->location }}</span>
                </div>
            </a>
          </div>

        </li>
    @endforeach
</ul>

@stop

@if ($page->type == 2)
    @section('contact-form')
        @if (!isset($message))
            {{ Form::open(array('route' => array('front.contact'))) }}
                <div class="form-group">
                    {{ Form::text('name', null, array('placeholder' => 'Name', 'class' => 'form-control')) }}
                    {{ $errors->first('name') }}
                </div>
                <div class="form-group">
                    {{ Form::text('email', null, array('placeholder' => 'Email', 'class' => 'form-control')) }}
                    {{ $errors->first('email') }}
                </div>
                <div class="form-group">
                    {{ Form::textarea('message', null, array('placeholder' => 'Message', 'class' => 'form-control')) }}
                    {{ $errors->first('message') }}
                </div>
                <div class="form-group">
                    {{ Form::button('Send', array('class' => 'btn btn-primary', 'type' => 'submit')) }} <small class="text-muted">All fields are required</small>
                </div>
            {{ Form::close() }}
        @else
            <div class="alert-box success">
                <p>{{ $message }}</p>
            </div>
        @endif
    @stop
@endif

{{--
@section('maps')
    <div id="map-canvas" style="width: 100%; height: 275px;"></div>
@stop

@if ($page->type == 2)
    @section('contact-form')
        @if (!isset($message))
            {{ Form::open(array('route' => array('front.contact'))) }}
                <div class="form-group">
                    {{ Form::text('name', null, array('placeholder' => 'Name', 'class' => 'form-control')) }}
                    {{ $errors->first('name') }}
                </div>
                <div class="form-group">
                    {{ Form::text('email', null, array('placeholder' => 'Email', 'class' => 'form-control')) }}
                    {{ $errors->first('email') }}
                </div>
                <div class="form-group">
                    {{ Form::textarea('message', null, array('placeholder' => 'Message', 'class' => 'form-control')) }}
                    {{ $errors->first('message') }}
                </div>
                <div class="form-group">
                    {{ Form::button('Send', array('class' => 'btn btn-primary', 'type' => 'submit')) }} <small class="text-muted">All fields are required</small>
                </div>
            {{ Form::close() }}
        @else
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
    @stop
@endif--}}


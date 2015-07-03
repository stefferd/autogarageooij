@extends('front.layouts.layout')

@section('meta'){{ $entry->title }} | {{ $page->title }}@stop

@section('keywords'){{ $page->keywords }}@stop

@section('description'){{ $page->description }}@stop

@section('title'){{ $entry->title }}@stop

@section('content')
    <ul class="breadcrumbs">
      <li><a href="/" title="Dexperts | Freelance Front-end Developer | Freelance PHP Developer">Home</a></li>
      <li><a href="/portfolio" title="Portfolio van Dexperts">Inventory</a></li>
      <li class="active">{{ $entry->title }}</li>
    </ul>
    <div class="row">
        <div class="columns small-12 medium-8">
            <div class="media">
                @foreach ($entry->pictures as $picture)
                    <div class="img">
                        <img src="{{ URL::asset('custom/owner_images/') }}/{{ $entry->id }}/{{ $picture->url }}" alt="{{$entry->title}}" />
                    </div>
                @endforeach
            </div>
        </div>
        <div class="columns small-12 medium-4">
            {{ $entry->description }}
            <a class="button small" href="{{ URL::route('front.portfolio') }}">Terug naar het overzicht</a>
            <div class="quickcontact">
                @if (!isset($message))
                    {{ Form::open(array('route' => array('front.portfolio.contact', $entry->id))) }}
                        <h3>Snel contact</h3>
                        <div class="form-group">
                            {{ Form::text('name', null, array('placeholder' => 'Naam', 'class' => 'form-control')) }}
                            {{ $errors->first('name') }}
                        </div>
                        <div class="form-group">
                            {{ Form::text('phone', null, array('placeholder' => 'Telefoonnummer', 'class' => 'form-control')) }}
                            {{ $errors->first('phone') }}
                        </div>
                        <div class="form-group">
                            {{ Form::text('email', null, array('placeholder' => 'Email', 'class' => 'form-control')) }}
                            {{ $errors->first('email') }}
                        </div>
                        <div class="form-group">
                            {{ Form::textarea('message', '', array('placeholder' => 'Bericht', 'class' => 'form-control')) }}
                            {{ $errors->first('message') }}
                        </div>
                        <div class="form-group">
                            {{ Form::button('Verzenden', array('class' => 'button primary', 'type' => 'submit')) }} <small class="text-muted">Alle velden zijn verplicht</small>
                        </div>
                    {{ Form::close() }}
                @else
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
            </div>
 {{--           <div class="newsletter">
                    {{ Form::open(array('route' => 'front.newsletter')) }}
                        <h3>Subscribe to our newsletter</h3>
                        <div class="form-group">
                            {{ Form::text('name', null, array('placeholder' => 'Name (optional)', 'class' => 'form-control')) }}
                        </div>
                        <div class="form-group">
                            {{ Form::text('email', null, array('placeholder' => 'Email', 'class' => 'form-control')) }}
                            {{ $errors->first('email') }}
                        </div>
                        <div class="form-group">
                            {{ Form::button('Subscribe', array('class' => 'btn btn-default', 'type' => 'submit')) }}
                        </div>
                    {{ Form::close() }}
                    <p>{{ Session::get('message') }}</p>
            </div>--}}
        </div>
    </div>
@stop

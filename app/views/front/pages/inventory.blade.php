@extends('front.layouts.layout')

@section('meta'){{ $page->title }}@stop

@section('keywords'){{ $page->keywords }}@stop

@section('description'){{ $page->description }}@stop

@section('title'){{ $page->title }}@stop

@section('content')
    <ol class="breadcrumbs">
      <li><a href="/" title="Autogarageooij">Home</a></li>
      <li class="active">Occasions</li>
    </ol>
    @if(Session::has('success'))
        <div class="alert alert-success">
            <p>{{ Session::get('success') }}</p>
        </div>
    @endif
    <div class="row">
        <div class="col-xs-12 col-sm-2">
            <h3>Filters</h3>
            {{ Form::open(array('route' => 'front.inventory.filter')) }}
            <div class="form-group">
                <label for="brand" class="label-form">Merk</label>
                {{--@foreach ($brandsForFilter as $brandFilter)--}}
                    {{--<div class="checkbox">--}}
                      {{--<label>--}}
                        {{--{{ Form::checkbox('brand', $brandFilter, false, ['onClick' => 'this.form.submit()']) }}--}}
                        {{--{{ $brandFilter }}--}}
                      {{--</label>--}}
                    {{--</div>--}}
                {{--@endforeach--}}
            </div>
            <div class="form-group">
                <label for="transmission" class="label-form">Transmissie</label>
                <div class="checkbox">
                  <label>
                    {{ Form::checkbox('transmission', 'Automatisch', false, ['onClick' => 'this.form.submit()']) }}
                      Automatisch
                  </label>
                </div>
                <div class="checkbox">
                  <label>
                    {{ Form::checkbox('transmission', 'Handgeschakeld', false, ['onClick' => 'this.form.submit()']) }}
                    Handgeschakeld
                  </label>
                </div>
            </div>
            {{ Form::close() }}
        </div>
        <div class="col-xs-12 col-sm-10">
            @foreach ($entries as $entry)
                <div class="media row">
                  @if ($entry->pictures()->count() > 0)
                    @if ($entry->car->main_pic > 0)
                        <a class="media-left media-top col-xs-12 col-md-6" href="{{ URL::route('front.inventory.details', array('id' => $entry->id)) }}">
                            @if ($entry->car->status == 'Sold')
                                <span class="flag sold">&nbsp;</span>
                            @elseif ($entry->car->status == 'Coming soon')
                                <span class="flag coming">&nbsp;</span>
                            @elseif ($entry->car->status == 'Reserved')
                                <span class="flag reserved">&nbsp;</span>
                            @endif
                            <img src="{{ URL::asset('custom/owner_images/') }}/{{ $entry->id }}/750-{{ Pictures::where('id', $entry->car->main_pic)->first()->url }}" class="img-responsive" alt="{{$entry->title}}" />
                        </a>
                    @else
                        <a class="media-left media-top col-xs-12 col-md-6" href="{{ URL::route('front.inventory.details', array('id' => $entry->id)) }}">
                            @if ($entry->car->status == 'Sold')
                                <span class="flag sold">&nbsp;</span>
                            @elseif ($entry->car->status == 'Coming soon')
                                <span class="flag coming">&nbsp;</span>
                            @elseif ($entry->car->status == 'Reserved')
                                <span class="flag reserved">&nbsp;</span>
                            @endif
                            <img src="{{ URL::asset('custom/owner_images/') }}/{{ $entry->id }}/750-{{ $entry->pictures()->first()->url }}" class="img-responsive" alt="{{$entry->title}}" />
                        </a>
                    @endif
                  @endif
                  <div class="media-body col-xs-12 col-md-6">
                    <h4 class="media-heading">{{ $entry->title }} <small class="pull-right">&euro; {{ $entry->car->price }}</small></h4>
                    <a class="btn btn-primary btn-sm pull-right" href="{{ URL::route('front.inventory.details', array('id' => $entry->id)) }}">More information</a>
                    <dl class="dl-horizontal">
                        <dt>Inventory #</dt><dd>{{$entry->id }}</dd>
                        <dt>Location</dt><dd>{{ $entry->car->location }}</dd>
                        <dt>Make</dt><dd>{{ $entry->car->make }}</dd>
                        <dt>Brand</dt><dd>{{ $entry->car->brand }}</dd>
                        <dt>Type</dt><dd>{{ $entry->car->type }}</dd>
                        <dt>Status</dt><dd>{{ $entry->car->status }}</dd>
                    </dl>
                  </div>
                </div>
            @endforeach
        </div>
    </div>
@stop

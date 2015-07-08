@extends('front.layouts.layout')

@section('meta'){{ $entry->title }} | {{ $page->title }}@stop

@section('keywords'){{ $page->keywords }}@stop

@section('description'){{ $page->description }}@stop

@section('title'){{ $entry->title }}@stop

@section('content')
    <ol class="breadcrumbs">
      <li><a href="/" title="Autogarageooij">Home</a></li>
      <li><a href="/occasions" title="Occassions van autogaraga ooij">Occasions</a></li>
      <li class="active">{{ $entry->title }}</li>
    </ol>
    <div class="row">
        <div class="medium-6 columns">
            <div class="media">
                @foreach ($entry->pictures as $picture)
                    <div class="img">
                        <img src="{{ URL::asset('custom/owner_images/') }}/{{ $entry->id }}/{{ $picture->url }}" class="img-responsive" alt="{{$entry->title}}" />
                    </div>
                @endforeach
            </div>
        </div>
        <div class="medium-6 columns">
            <div class="details">
                <h2 class="tag">&euro; {{ number_format($entry->car->price, 0, ',', '.') }}</h2>
                <p>{{ $entry->description }}</p>
                <a class="button secondary round" href="{{ URL::route('front.inventory') }}">Terug naar occasions</a>
                <dl class="dl-horizontal">
                    <dt>Merk</dt><dd>{{ $entry->car->brand }}</dd>
                    <dt>Model</dt><dd>{{ $entry->car->type }}</dd>
                    <dt>Uitvoering</dt><dd>{{ $entry->car->engine }}</dd>
                    <dt>Bouwjaar</dt><dd>{{ $entry->car->make }}</dd>
                    <dt>Beschikbaar</dt><dd>
                        @if ($entry->car->status === 'Available')
                            Beschikbaar
                        @elseif($entry->car->status == 'Available Soon')
                            Binnenkort beschikbaar
                        @elseif($entry->car->status == 'Sold')
                            Verkocht
                        @elseif($entry->car->status == 'Reserved')
                            Gereserveerd
                        @endif
                    </dd>
                    <dt>Kilometerstand</dt><dd>{{ $entry->car->milage }}</dd>
                    <dt>Transmissie</dt><dd>{{ $entry->car->transmission }}</dd>
                    @if (!empty($entry->car->youtube))
                        <dt>Youtube</dt><dd>{{ $entry->car->youtube }}</dd>
                    @endif
                </dl>
            </div>
        </div>
    </div>
@stop

@extends('front.layouts.layout')

@section('meta'){{ isset($filters['brand']) ? $filters['brand'][0] : '' }}{{ (isset($filters['brand']) && isset($filters['transmission'])) ? ' / ': '' }}{{ isset($filters['transmission']) ? $filters['transmission'][0] : '' }} | {{ $page->title }} | @stop

@section('keywords'){{ $page->keywords }}@stop

@section('description'){{ $page->description }}@stop

@section('title'){{ $page->title }}@stop

@section('content')
    <ol class="breadcrumbs">
      <li><a href="{{ URL::route('front.index') }}" title="Milkim classic cars sells classic cars">Home</a></li>
      @if (isset($filters))
        <li><a href="{{ URL::route('front.inventory') }}" title="Inventory of Milkimclassiccars">Inventory</a></li>
        <li><strong>Filter: </strong>
            {{ isset($filters['brand']) ? $filters['brand'][0] : '' }}
            {{ (isset($filters['brand']) && isset($filters['transmission'])) ? ' / ': '' }}
            {{ isset($filters['transmission']) ? $filters['transmission'][0] : '' }}
        </li>
      @else
        <li class="active">Inventory</li>
      @endif
    </ol>
    <div class="row">
        <div class="small-12 columns">
            @if (count($entries) == 0 || empty($entries))
                <p>Bedankt voor de interesse voor onze occasions.</p>
                <p>Helaas zijn er op dit moment geen occasions, probeer het later nog eens om ons occasion aanbod te bekijken.</p>
            @else
                @foreach ($entries as $entry)
                    <div class="media row">
                      @if ($entry->pictures()->count() > 0)
                          @if ($entry->car->main_pic > 0)
                              <a class="media-left media-top small-12 medium-6 columns" href="{{ URL::route('front.inventory.details', array('id' => $entry->id)) }}">
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
                              <a class="media-left media-top small-12 medium-6 columns" href="{{ URL::route('front.inventory.details', array('id' => $entry->id)) }}">
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
                      <div class="media-body  small-12 medium-6 columns">
                          <dl class="dl-horizontal">
                              <dt>Merk</dt><dd>{{ $entry->car->brand }}</dd>
                              <dt>Model</dt><dd>{{ $entry->car->type }}</dd>
                              <dt>Uitvoering</dt><dd>{{ $entry->car->engine }}</dd>
                              <dt>Bouwjaar</dt><dd>{{ $entry->car->make }}</dd>
                              <dt>Kilometerstand</dt><dd>{{ $entry->car->milage }}</dd>
                              <dt>Transmissie</dt><dd>{{ $entry->car->transmission }}</dd>
                              @if (!empty($entry->car->youtube))
                                  <dt>Youtube</dt><dd>{{ $entry->car->youtube }}</dd>
                              @endif
                          </dl>
                          <ul class="inline-list">
                              <li><a class="button round" href="{{ URL::route('front.inventory.details', array('id' => $entry->id)) }}">Meer informatie</a></li>
                              <li><h3 style="color: #FFF; line-height: 45px;">&euro; {{number_format($entry->car->price, 0, ',', '.')}}</h3></li>
                          </ul>


                      </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@stop

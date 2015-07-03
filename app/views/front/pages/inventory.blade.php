@extends('front.layouts.layout')

@section('meta'){{ $page->title }}@stop

@section('keywords'){{ $page->keywords }}@stop

@section('description'){{ $page->description }}@stop

@section('title'){{ $page->title }}@stop

@section('content')
    <ul class="breadcrumbs">
      <li><a href="/" title="Dexperts | Freelance Front-end Developer | Freelance PHP Developer">Home</a></li>
      <li class="active">Portfolio</li>
    </ul>
    @if(Session::has('success'))
        <div class="alert alert-success">
            <p>{{ Session::get('success') }}</p>
        </div>
    @endif
    <div class="row">
        <div class="columns small-12">
            <ul class="clearing-thumbs small-block-grid-1 medium-block-grid-2">
                @foreach ($items as $item)
                    <li>
                      <div class="portfolioItems">
                        <a href="{{ URL::route('front.portfolio.details', array('id' => $item->id)) }}">
                            <img data-caption="{{ $item->title }}" src="/custom/owner_images/{{ $item->id }}/{{ $item->pictures->first()->url }}">
                            <div class="caption">
                                <span>{{$item->project->role}}</span>
                                <h5>{{ $item->title }}</h5>
                            </div>
                        </a>
                        <p class="meta">{{$item->project->start}} / {{$item->project->end}}</p>
                        <p class="meta-description">{{ str_limit(strip_tags($item->description), 250) }}</p>
                      </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@stop

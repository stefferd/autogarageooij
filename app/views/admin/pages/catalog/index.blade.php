@extends('admin.layouts.layout')

@section('meta')
    {{ Lang::get('catalog.headtitle') }}
@stop

@section('title')
    {{ Lang::get('catalog.index') }}
@stop

@section('content')
    @if(Session::has('success'))
    <div class="alert alert-success">
        <p>{{ Session::get('success') }}</p>
    </div>
    @endif
    <table class="table table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>{{ Lang::get('catalog.title') }}</th>
                <th>{{ Lang::get('catalog.created_at') }}</th>
                <th>{{ Lang::get('catalog.updated_at') }}</th>
                <th>{{ Lang::get('admin.actions') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach($items as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->title}}</td>
                    <td>{{$item->created_at}}</td>
                    <td>{{$item->updated_at}}</td>
                    <td>
                        <div class="btn-group">
                            <a class="btn btn-xs btn-default" href="{{ URL::route('admin.catalog.edit', array('id' => $item->id)) }}">{{ Lang::get('admin.action_edit') }}</a>
                            <button type="button" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ URL::route('admin.newsletter.create', array('catalog' => $item->id)) }}">{{ Lang::get('admin.action_newsletter') }}</a></li>
                                <li class="seperator">&nbsp;</li>
                                <li><a href="{{ URL::route('admin.catalog.delete', array('id' => $item->id)) }}">{{ Lang::get('admin.action_delete') }}</a></li>
                            </ul>
                        </div>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ URL::route('admin.catalog.create') }}">{{ Lang::get('admin.action_add') }}</a>
@stop
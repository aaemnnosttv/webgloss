@extends('layouts.master')

@section('content')

    <h1 class="page-header">Aliases for: {{ $term->name }}</h1>

    @if ($alias = session('success'))
        <div class="alert alert-success">
            New alias <em>{{ $alias->name }}</em> added successfully!
        </div>
    @endif

    <ul class="list-inline">
        @foreach($term->aliases as $alias)
            <li><span class="label label-default">{{ $alias->name }}</span></li>
        @endforeach
    </ul>

    <form action="/term/{{ $term->id }}/aliases" method="post">
        {!! csrf_field() !!}

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Alias!</button>
    </form>
@stop
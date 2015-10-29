@extends('layouts.master')

@section('content')
    <h1 class="page-heading">Editing: {{$term->name}}</h1>

    @if ($term->aliases)
        <ul class="Term_Aliases list-inline">
            <li>A.K.A:</li>
        @foreach($term->aliases as $alias)
            <li>{{ $alias->name }}</li>
        @endforeach
        </ul>
    @endif


    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('term.update', [$term->id]) }}" method="post">
        {!! csrf_field() !!}
        {!! method_field('PUT') !!}

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{$term->name}}">
        </div>
        <div class="form-group">
            <label for="acronym">Acronym</label>
            <input type="text" name="acronym" class="form-control" size="10" maxlength="10" value="{{$term->acronym}}">
        </div>
        <div class="form-group">
            <label for="definition">Definition</label>
            <textarea type="text" name="definition" class="form-control">{{$term->definition}}</textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{ route('term.index') }}" class="btn btn-default">Back</a>
        </div>
    </form>

@stop

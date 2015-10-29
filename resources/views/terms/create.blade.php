@extends('layouts.master')

@section('content')
    <h1>Define a new term</h1>

    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('term.store') }}" method="post">
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="acronym">Acronym</label>
            <input type="text" name="acronym" size="10" maxlength="10" class="form-control">
        </div>
        <div class="form-group">
            <label for="definition">Definition</label>
            <textarea type="text" name="definition" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-large">Submit</button>
        </div>
    </form>


@stop
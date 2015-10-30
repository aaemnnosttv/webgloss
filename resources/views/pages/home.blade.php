@extends('layouts.master')


@section('content')

    <div class="jumbotron">
        <h1 class="display-3">
            <small>Welcome to</small> WebGl<em>o</em>ss!</h1>
        <p class="lead">The most extensive and informative glossary for webstuffs on the interwebz.</p>
        <hr class="m-y-md">
        {{--<p>It uses utility classes for typography and spacing to space content out within the larger container.</p>--}}
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="{{ route('term.index') }}" role="button">Start Browsing</a>
        </p>
    </div>

@stop
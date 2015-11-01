<html>
<head>
    <title>WebGloss - A glossary for aspiring web developers</title>
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>

<header class="primary">
    <nav class="navbar navbar-light bg-faded">
        <div class="container">
            <a class="navbar-brand" href="/">WebGloss</a>
            <ul class="nav navbar-nav">
                <nav-item link="{{ route('term.index') }}" inner="Terms"></nav-item>
                <nav-item link="{{ route('term.create') }}" inner="Define"></nav-item>
            </ul>
        </div>
    </nav>
</header>

<main>
    <div class="container">
        @yield('content')
    </div>
</main>

<footer>
    <div class="container text-muted">
        <div class="built-with text-center">
            <ul class="list-inline">
                <li><a href="http://laravel.com" target="_blank">Laravel</a></li>
                <li><a href="http://vuejs.org/" target="_blank">Vue</a></li>
                <li><a href="https://pusher.com" target="_blank">Pusher</a></li>
                <li><a href="http://v4-alpha.getbootstrap.com/" target="_blank">Bootstrap</a></li>
            </ul>
            <div class="byline"><a href="https://github.com/aaemnnosttv/webgloss"><i class="fa fa-2x fa-github"></i></a></div>
        </div>
    </div>
</footer>

<script>
window.App = {
    csrfToken: '{{ csrf_token() }}',
    debug: {{ (bool) env('APP_DEBUG') }},
    pusher: {
        key: '{{ env('PUSHER_KEY') }}'
    }
}
</script>
<script src="/js/app.js"></script>
@yield('scripts')
</body>
</html>
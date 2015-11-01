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
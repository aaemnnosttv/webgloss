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
                <li class="nav-item"><a class="nav-link" href="{{ route('terms') }}">Terms</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ action('TermsController@create') }}">Define</a></li>
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
}
</script>
<script src="/js/app.js"></script>
@yield('scripts')
</body>
</html>
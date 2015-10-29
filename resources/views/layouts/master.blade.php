<html>
<head>
    <title>WebGloss - A glossary for aspiring web developers</title>
    <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-MfvZlkHCEqatNoGiOXveE8FIwMzZg4W85qfrfIFBfYc= sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous"> -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha256-k2/8zcNbxVIh5mnQ52A0r3a6jAgMGxFJFE2707UxGCk= sha512-ZV9KawG2Legkwp3nAlxLIVFudTauWuBpC10uEafMHYL0Sarrz5A7G79kXh5+5+woxQ5HM559XX2UZjMJ36Wplg==" crossorigin="anonymous">
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
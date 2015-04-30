<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Portada / {{ $feed->title }}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Portada · Una mejor experiencia para leer noticias.">
        <meta name="author" content="Pablo Massa · Ignacio Toledo">
        
        <?php if(App::environment('production')): ?>
            <link rel="stylesheet" href="{{ elixir("css/main.css") }}">
        <?php else: ?>
            <link rel="stylesheet" href="/css/main.css">
        <?php endif ?>

        <!-- Open graph -->
        <meta property="og:title" content="Portada" />
        <meta property="og:description" content="Una mejor experiencia para leer noticias." />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="http://portada.uy" />
        <meta property="og:image" content="http://portada.uy/favicons/favicon-192.png" />
        <meta property="og:site_name" content="Portada" />
        <!-- .Open graph -->

        @include('partials.favicons')

        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>

        <!-- Polymer -->
        <script src="/components/webcomponentsjs/webcomponents.min.js"></script>
        <link rel="import" href="/components/core-tooltip/core-tooltip.html">
        <script>var Portada = {};</script>
    </head>

    <body class="page-feed">

        @include('partials.news-card')

        <header class="header">
            <h1 class="top-title">
                <a href="/">Portada</a>
            </h1>
            <p class="tagline">Una mejor experiencia para leer noticias.</p>
            <a href="/opciones" class="btn-settings js-modal">Opciones</a>
        </header>

        <main class="main container">

            <h1 class="title-medium">{{ $feed->title }}</h1>

            <section class="news-list">

                <div class="loading">
                    <svg class="spinner" width="65px" height="65px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
                       <circle class="path" fill="none" stroke-width="6" stroke-linecap="round" cx="33" cy="33" r="30"></circle>
                    </svg>
                </div>
            </section>

            <button class="po-btn load-more js-load-more">Cargar más</button>

        </main> <!-- /container -->

        <div class="share-section">
            <div class="share-box">
                <p class="share-me">
                    Compartir
                </p>
                <div class="share-items">
                    <a href="https://twitter.com/intent/tweet?text=Portada%20·%20Una%20mejor%20experiencia%20para%20leer%20noticias.%20http://portada.uy" class="share-item tw">Compartir en Twitter</a>
                    <a href="https://facebook.com/sharer/sharer.php?u=http://portada.uy" class="share-item fb">Compartir en Facebook</a>
                </div>

            </div>
        </div>
        
        <?php if(App::environment('production')): ?>
            <script src="{{ elixir("js/all.js") }}"></script>
            <script>
                (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
                ga('create', 'UA-47919022-11', 'auto');
                ga('send', 'pageview');
            </script>
        <?php else: ?>
            <script src="/components/jquery/dist/jquery.min.js"></script>
            <script src="/components/mustache/mustache.js"></script>
            <script src="/components/store.js/store.min.js"></script>
            <script src="/js/app.js"></script>
        <?php endif ?>
    </body>
</html>

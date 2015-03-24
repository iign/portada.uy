<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title>Portada.UY</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Portada.uy · Una mejor experiencia para leer noticias.">
        <meta name="author" content="Pablo Massa · Ignacio Toledo">

        <link rel="stylesheet" href="css/main.css">

        <!-- Open graph -->
        <meta property="og:title" content="Portada.UY" />
        <meta property="og:description" content="Una mejor experiencia para leer noticias." />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="http://portada.uy" />
        <meta property="og:image" content="http://portada.uy/uploads/fb.png" />
        <meta property="og:site_name" content="Portada.UY" />
        <!-- .Open graph -->

        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <link rel="shortcut icon" href="images/favicon.png">
        <link href='http://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>

        <!-- Polymer -->
        <link rel="import" href="components/paper-checkbox/paper-checkbox.html">
        <link rel="import" href="components/core-tooltip/core-tooltip.html">
        <script>var Portada = {};</script>
    </head>

    <body class="page-settings">

        <div class="notification">
            Opciones guardadas ;)
        </div>

        <div class="overlay">
            <a href="/" class="icon icon-close">Cerrar</a>
            <div class="modal-container">
                <h2 class="title">Opciones</h2>
                <div class="opt-group">
                    <h3 class="title-sub">
                        Medios a mostrar
                    </h3>

                    <div class="col half">
                    @foreach ($feeds as $feed)
                        <paper-checkbox data-medium-id="{{ $feed->id }}" 
                                        class="chk-medium" label="{{ $feed->title }}" 
                                        id="chk-medium-{{ $feed->id }}"></paper-checkbox>
                    @endforeach

                    </div>
                    <div class="col half">
                        @foreach ($feedsSecond as $feed)
                        <paper-checkbox data-medium-id="{{ $feed->id }}" 
                                        class="chk-medium" label="{{ $feed->title }}" 
                                        id="chk-medium-{{ $feed->id }}"></paper-checkbox>
                    @endforeach
                    </div>

                </div>
                <div class="opt-group">
                    <h3 class="title-sub">
                        Usabilidad
                    </h3>
                    <paper-checkbox class="chk-medium js-chk-open-readability"  
                                    label="Abrir enlaces en Readability" 
                                    id="chk-open-readability"></paper-checkbox>

                    <core-tooltip large position="top">
                        <div class="help-icon">[?]</div>
                        <div tip class="tooltip">
                            Readability mejora la legibilidad, 
                            <br> utilizando un servicio externo (Readability.com)
                        </div>
                    </core-tooltip>

                    <paper-checkbox class="chk-medium js-chk-open-new-window"  
                                    label="Abrir enlaces en pestaña nueva" 
                                    id="chk-open-new-window"></paper-checkbox>
                </div>
                <div class="opt-group">
                    <h3 class="title-sub">
                        Blog
                    </h3>
                    Blog con novedades del proyecto: <br>
                    <a href="http://medium.com/@PortadaUY">medium.com/@PortadaUY</a>
                </div>
                <div class="opt-group">
                    <h3 class="title-sub">
                        Sobre el proyecto
                    </h3>
                    Portada es un hermoso proyecto que nace en 2014 porque
                    pintó. Cuando tengamos tiempo y ganas quizá acá pongamos
                    algo re profundo.
                </div>
                <div class="opt-group">
                    <h3 class="title-sub">
                        Compartir
                    </h3>
                    <p>
                        No hacemos publicidad, si el sitio te parece útil, compartilo.
                    </p>
                    <p>
                        Compartir en 
                        <a href="https://facebook.com/sharer/sharer.php?u=http://beta.portada.uy">
                            Facebook
                        </a> 
                        / 
                        <a href="https://twitter.com/intent/tweet?text=Portada.uy%20·%20Una%20mejor%20experiencia%20para%20leer%20noticias.%20http://beta.portada.uy">
                            Twitter
                        </a>
                    </p>

                </div>

                <div class="opt-group">
                    <h3 class="title-sub">Feedback</h3>

                    <p>
                        Contanos tu experiencia y sugerencias para mejorar Portada.UY
                        a <a href="mailto:portada.uy@gmail.com">portada.uy@gmail.com</a>
                    </p>
                </div>

                <span class="love">
                    Hecho con <span class="heart"></span> por
                    <a href="http://ign.uy">Ignacio Toledo</a> y
                    <a href="http://pablomassa.com">Pablo Massa</a>.
                </span>
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
            <script src="components/jquery/dist/jquery.min.js"></script>
            <script src="components/mustache/mustache.js"></script>
            <script src="components/store.js/store.min.js"></script>
            <script src="js/app.js"></script>
        <?php endif ?>
    </body>
</html>

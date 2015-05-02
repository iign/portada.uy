var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
  mix.scripts(["components/jquery/dist/jquery.min.js",
               "components/mustache/mustache.js",
               "components/jquery-timeago/jquery.timeago.js",
               "components/store.js/store.min.js",
               "js/app.js"],
               "public/js/all.js",
               "public")
     .version(["public/css/main.css", "public/js/all.js"])
     .copy("public/img", "public/build/img")
});


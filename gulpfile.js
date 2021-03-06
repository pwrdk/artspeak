var elixir = require('laravel-elixir');
/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.sass('app.scss');
    // mix.scripts([
    // 	'../../../node_modules/jquery.countdown/jquery.countdown.js'
    // 	],
    // 	'public/assets/js/vendor-libs.js');
    mix.browserify('main.src.js','public/assets/js/main.js');
    mix.browserify('input.src.js','public/assets/js/input.js');
});

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
    mix.copy('bower_components/font-awesome/fonts/', 'public/fonts');

    mix.sass('app.scss')
			.scripts('app.js')
			.browserify('app.js')
    	.browserSync({
    		proxy: 'http://webgloss.app'
		});
});

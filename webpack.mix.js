const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */
////Juego
mix.babel([
  'resources/js/axios.min.js',
  'resources/js/materialize.min.js',
  'resources/js/sweetalert.min.js',
//   'resources/assets/inicio/js/config.js',
  'node_modules/vue/dist/vue.min.js',
  'resources/js/juego.js',
], 'public/js/juego.min.js')
   .babel([
     'resources/sass/materialize.min.css',
     'resources/sass/animate.min.css',
     'resources/sass/juego.css',
   ], 'public/css/juego.min.css');

// Home
mix.babel([
  'resources/js/axios.min.js',
  'resources/js/materialize.min.js',
  // 'resources/js/sweetalert.min.js',
//   'resources/assets/inicio/js/config.js',
  'node_modules/vue/dist/vue.min.js',
  'resources/js/home.js',
], 'public/js/home.min.js')
   .babel([
     'resources/sass/materialize.min.css',
     'resources/sass/animate.min.css',
     'resources/sass/home.css',
   ], 'public/css/home.min.css');

   // Dash
mix.babel([
  'resources/js/axios.min.js',
  'resources/js/materialize.min.js',
  'resources/js/sweetalert.min.js',
//   'resources/assets/inicio/js/config.js',
  'node_modules/vue/dist/vue.min.js',
  'resources/js/dash.js',
], 'public/js/dash.min.js')
   .babel([
     'resources/sass/materialize.min.css',
     'resources/sass/animate.min.css',
     'resources/sass/dash.css',
   ], 'public/css/dash.min.css');

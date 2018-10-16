var mix = require('laravel-mix');

mix.js('resources/js/league/league.js', 'public/js')
  .js('resources/js/app.js', 'public/js')
  .sass('resources/sass/app.scss', 'public/css');

if (process.env.NODE_ENV === 'production') {
  mix.version();
}

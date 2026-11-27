const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | MiniBook uses Bootstrap 5 with a custom Sass layer for design tokens.
 | Bootstrap Icons are copied as static assets so they work offline.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .copy('node_modules/bootstrap-icons/font/fonts', 'public/css/fonts')
    .copy('node_modules/bootstrap-icons/font/bootstrap-icons.css', 'public/css/bootstrap-icons.css');

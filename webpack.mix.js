const mix = require('laravel-mix');


mix.js('resources/js/app.js', 'public/js')
    .postCss('resources/css/app.css', 'public/css');


mix.sass('public/resources/scss/layouts/vertical-light-menu/light/loader.scss', 'public/css')
    .postCss('resources/css/loader.css', 'public/css');

mix.sass('public/resources/scss/light/assets/components/modal.scss', 'public/css')
    .postCss('resources/css/modal.css', 'public/css');


const {mix} = require('laravel-mix');

mix.setPublicPath('public');

mix.copy('app/resources/assets/images', 'public/assets/app/images', false);

mix.js('app/resources/assets/js/app.js', 'public/assets/app/js')
    .sass('app/resources/assets/sass/app.scss', 'public/assets/app/css')
    .version();

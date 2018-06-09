const mix = require('laravel-mix');

mix.setPublicPath('assets');
mix.setResourceRoot('./');

mix.js('src/js/custom.js', 'assets/custom.js');
mix.sass('src/css/style.scss', 'assets/style.css');

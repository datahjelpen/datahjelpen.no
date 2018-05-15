let mix = require('laravel-mix');

mix.copy('resources/assets/images', 'public/images', false).version();

mix.js('resources/assets/js/app.js', 'public/js').version();

mix.sass('resources/assets/sass/app.scss', 'public/css').version();

mix.browserSync('localhost:8000');

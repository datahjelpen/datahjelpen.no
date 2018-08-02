let mix = require('laravel-mix');

mix.copy('resources/assets/images', 'public/images', false).version();

mix.js('resources/assets/js/app.js', 'public/js').version();
mix.js('resources/assets/js/texteditor.js', 'public/js').version();

mix.sass('resources/assets/sass/app.scss', 'public/css').version();
mix.sass('resources/assets/sass/pell.scss', 'public/css').version();

mix.browserSync('localhost:8000');

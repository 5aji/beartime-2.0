let mix = require('laravel-mix');

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


mix.webpackConfig({
    resolve: {
        alias: {
            // Force all modules to use the same jquery version.
            'jquery': path.join(__dirname, 'node_modules/jquery/src/jquery')
        }
    }
});

mix.js('resources/assets/js/app.js', 'public/js')
    .js('resources/assets/semantic/dist/semantic.min.js', 'public/js')
    .styles(['resources/assets/semantic/dist/semantic.min.css'], 'public/css/semantic.css')
    .copy('resources/assets/semantic/dist/themes', 'public/css/themes')
    .sass('resources/assets/sass/app.scss', 'public/css');

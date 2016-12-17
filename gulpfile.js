const elixir = require('laravel-elixir');

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

elixir(mix => {
    mix.sass(['app.scss'], 'resources/assets/css/app.css')
    .webpack('app.js')
    .scripts(['../bower/fine-uploader/dist/fine-uploader.js',
        '../bower/moment/moment.js',
        '../bower/pikaday/pikaday.js',
        '../bower/slick-carousel/slick/slick.js',
        '../bower/photoswipe/dist/photoswipe.js',
        '../bower/photoswipe/dist/photoswipe-ui-default.js'])
    .styles(['app.css', 'bootstrap-modal.css',
        '../bower/fine-uploader/dist/fine-uploader-gallery.css',
        '../bower/pikaday/css/pikaday.css',
        '../bower/slick-carousel/slick/slick.css',
        '../bower/slick-carousel/slick/slick-theme.css',
        '../bower/photoswipe/dist/photoswipe.css',
        '../bower/photoswipe/dist/default-skin/default-skin.css' ],
        'public/css/app.css')
    .version('css/app.css')
    .copy('resources/assets/img', 'public/css')
    .copy('resources/assets/bower/slick-carousel/slick/fonts/', 'public/css/fonts')
    .copy('resources/assets/bower/photoswipe/dist/default-skin/default-skin.svg', 'public/css')
    .copy('resources/assets/bower/font-awesome/fonts/', 'public/fonts');
});

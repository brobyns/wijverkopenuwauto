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
    .scripts(['../bower/fine-uploader/dist/fine-uploader.js', '../bower/pikaday/pikaday.js'])
    .styles(['app.css', 'bootstrap-modal.css', '../bower/fine-uploader/dist/fine-uploader-gallery.css'], 'public/css/app.css')
    .version('css/app.css')
    .copy('resources/assets/img', 'public/css')
    .copy('resources/assets/bower/font-awesome/fonts/', 'public/fonts');
});

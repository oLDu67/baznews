/**
 * Created by aliduman on 06/05/2017.
 */
var elixir = require('laravel-elixir');

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

elixir(function(mix) {
    mix.sass('app.scss');

    // Compile Less
    //mix.less('admin.less', 'public/assets/css/admin.css');
});

/**
 * Copy any needed files.
 *
 * Do a 'gulp copyfiles' after bower updates
 */
elixir(function(mix) {
    //JS Component Copy
    mix.copy('node_modules/icheck/**', 'public/themes/news-theme/assets/js/icheck');
    mix.copy('node_modules/admin-lte/**', 'public/themes/news-theme/assets/AdminLTE');
    mix.copy('node_modules/bootstrap/**', 'public/themes/news-theme/assets/js/bootstrap');
    mix.copy('node_modules/jquery/**', 'public/themes/news-theme/assets/js/jquery');
    mix.copy('node_modules/jquery-mousewheel/**', 'public/themes/news-theme/assets/js/jquery-mousewheel');
    mix.copy('node_modules/jquery-ticker/**', 'public/themes/news-theme/assets/js/jquery-ticker-master');
    mix.copy('node_modules/bxslider/**', 'public/themes/news-theme/assets/js/bxslider');
    mix.copy('node_modules/malihu-custom-scrollbar-plugin/**', 'public/themes/news-theme/assets/js/malihu-custom-scrollbar-plugin');
    mix.copy('node_modules/theia-sticky-sidebar/**', 'public/themes/news-theme/assets/js/sticky-sidebar');
    mix.copy('node_modules/video.js/**', 'public/themes/news-theme/assets/js/video-js');
    mix.copy('node_modules/summernote/**', 'public/themes/news-theme/assets/js/summernote');
    mix.copy('node_modules/bootstrap-tagsinput/**', 'public/themes/news-theme/assets/js/bootstrap-tagsinput');
    mix.copy('node_modules/jasny-bootstrap/**', 'public/themes/news-theme/assets/js/jasny-bootstrap');
    mix.copy('node_modules/select2/**', 'public/themes/news-theme/assets/js/select2');
    mix.copy('node_modules/codemirror/**', 'public/themes/news-theme/assets/js/codemirror');
    mix.copy('node_modules/eonasdan-bootstrap-datetimepicker/**', 'public/themes/news-theme/assets/js/bootstrap-datetimepicker');
    mix.copy('node_modules/moment/**', 'public/themes/news-theme/assets/js/moment');
    mix.copy('node_modules/datatables.net/**', 'public/themes/news-theme/assets/js/datatables');
    mix.copy('node_modules/datatables.net-bs/**', 'public/themes/news-theme/assets/js/bootstrap-datatables');
    mix.copy('node_modules/jquery/**', 'public/themes/news-theme/assets/js/jquery');
    mix.copy('node_modules/dropzone/**', 'public/themes/news-theme/assets/js/dropzone');

//CSS Component
    mix.copy('node_modules/components-font-awesome/**', 'public/themes/news-theme/assets/css/font-awesome');
});
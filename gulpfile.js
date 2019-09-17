const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

 elixir.config.assetsPath = 'public/themes/default/assets';
 elixir.config.publicPath = elixir.config.assetsPath;

 elixir.config.css.sass.pluginOptions.includePaths = [
 "node_modules/bootstrap-sass/assets/stylesheets",
 "node_modules/font-awesome/scss",
 ];

 elixir((mix) => {

     mix.copy("node_modules/bootstrap-sass/assets/fonts", elixir.config.publicPath+'/fonts');
     mix.copy("node_modules/font-awesome/fonts", elixir.config.publicPath+'/fonts');


     mix.copy('node_modules/bootstrap-sass/assets/javascripts/bootstrap.min.js', elixir.config.publicPath+'/js/bootstrap.js');
     mix.copy('node_modules/jquery/dist/jquery.min.js', elixir.config.publicPath+'/js/jquery.js');
    mix.copy('node_modules/moment/min/moment.min.js', elixir.config.publicPath+'/js/moment.js'); //helper script for date picker

    mix.copy('node_modules/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js', elixir.config.publicPath+'/js/datepicker.js');
    mix.copy('node_modules/eonasdan-bootstrap-datetimepicker/src/sass/_bootstrap-datetimepicker.scss', elixir.config.publicPath+'/sass/datepicker.scss');

    // mix.copy('node_modules/simplemde/dist/simplemde.min.css', elixir.config.publicPath+'/css/simplemde.css');
    // mix.copy('node_modules/simplemde/dist/simplemde.min.js', elixir.config.publicPath+'/js/simplemde.js');
    mix.copy('node_modules/tinymce/tinymce.min.js', elixir.config.publicPath+'/js/tinymce.js');
    mix.copy('node_modules/tinymce/plugins', elixir.config.publicPath+'/js/plugins');
    mix.copy('node_modules/tinymce/themes', elixir.config.publicPath+'/js/themes');
    mix.copy('node_modules/tinymce/skins', elixir.config.publicPath+'/js/skins');


    mix.copy('node_modules/flag-icon-css/css/flag-icon.min.css', elixir.config.publicPath+'/css/flag-icon.css');
    mix.copy("node_modules/flag-icon-css/flags", elixir.config.publicPath+'/flags');
    
    
    mix.scripts([
        'jquery.js', 'bootstrap.js', 'moment.js',
        'simplemde.js', 'datepicker.js','tinymce.js'
        ]);

    mix.sass('backend.scss').styles([
        'flag-icon.css',
        'simplemde.css',
        'font-awesome.min.css',
        'backend.css',
        'frontend.css'
        ]);

    mix.sass('frontend.scss');
});

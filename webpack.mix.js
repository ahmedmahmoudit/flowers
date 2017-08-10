const mix = require('laravel-mix').mix;

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

// mix.js('resources/assets/js/app.js', 'public/js')
//    .sass('resources/assets/sass/app.scss', 'public/css');

mix.styles([
  'public/plugins/bootstrap/css/bootstrap.min.css',
  'public/plugins/font-awesome/css/font-awesome.min.css',
  'public/plugins/simple-line-icons/simple-line-icons.min.css',
  'public/plugins/cubeportfolio/css/cubeportfolio.min.css',
  'public/plugins/slider-for-bootstrap/css/slider.css',
  'public/plugins/rs-plugin/css/settings.css'
], 'public/css/core-styles.css').version();

mix.styles([
  'public/plugins/bootstrap/css/bootstrap-rtl.min.css',
  'public/css/plugins-rtl.css',
  'public/css/components-rtl.css',
  'public/css/default-rtl.css',
], 'public/css/rtl-styles.css').version();

mix.styles([
  'public/css/plugins.css',
  'public/css/components.css',
  'public/css/default.css',
], 'public/css/ltr-styles.css').version();

// <script src="/plugins/jquery.min.js" type="text/javascript" ></script>
// <script src="/plugins/jquery-migrate.min.js" type="text/javascript" ></script>
// <script src="/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript" ></script>
//
// <script src="/plugins/cubeportfolio/js/jquery.cubeportfolio.min.js" type="text/javascript"></script>
// <script src="/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
// <script src="/plugins/fancybox/jquery.fancybox.pack.js" type="text/javascript"></script>
// <script src="/plugins/slider-for-bootstrap/js/bootstrap-slider.js" type="text/javascript"></script>
// <script src="/plugins/zoom-master/jquery.zoom.min.js" type="text/javascript"></script>
//
// <script src="/plugins/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
// <script src="/plugins/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
//
// <script src="/js/components.js" type="text/javascript"></script>
// <script src="/js/components-shop.js" type="text/javascript"></script>
// <script src="/js/app.js" type="text/javascript"></script>

mix.scripts([
  'public/plugins/jquery.min.js',
  'public/plugins/jquery-migrate.min.js',
  'public/plugins/bootstrap/js/bootstrap.min.js',
  'public/plugins/cubeportfolio/js/jquery.cubeportfolio.min.js',
  'public/plugins/counterup/jquery.counterup.min.js',
  'public/plugins/fancybox/jquery.fancybox.pack.js',
  'public/plugins/slider-for-bootstrap/js/bootstrap-slider.js',
  'public/plugins/zoom-master/jquery.zoom.min.js',
  'public/plugins/rs-plugin/js/jquery.themepunch.tools.min.js',
  'public/plugins/rs-plugin/js/jquery.themepunch.revolution.min.js',
  'public/js/components.js',
  'public/js/components-shop.js',
  'public/js/app.js'
], 'public/js/core-scripts.js').version();
const mix = require('laravel-mix').mix;

mix.styles([
  'public/plugins/bootstrap/css/bootstrap.min.css',
  'public/plugins/font-awesome/css/font-awesome.min.css',
  'public/plugins/simple-line-icons/css/simple-line-icons.min.css',
  'public/plugins/cubeportfolio/css/cubeportfolio.min.css',
  'public/plugins/slider-for-bootstrap/css/slider.css',
  'public/plugins/revo-slider/css/settings.css',
  'public/plugins/revo-slider/css/layers.css',
  'public/plugins/revo-slider/css/navigation.css',
  'public/css/plugins.css',
  'public/css/components.css',
  'public/css/default.css',
  'public/css/custom.css'
], 'public/dist/css/style.css').version();

mix.styles([
  'public/plugins/bootstrap/css/bootstrap-rtl.min.css',
  'public/plugins/font-awesome/css/font-awesome.min.css',
  'public/plugins/simple-line-icons/css/simple-line-icons.min.css',
  'public/plugins/cubeportfolio/css/cubeportfolio.min.css',
  'public/plugins/slider-for-bootstrap/css/slider.css',
  'public/plugins/revo-slider/css/settings.css',
  'public/plugins/revo-slider/css/layers.css',
  'public/plugins/revo-slider/css/navigation.css',
  'public/plugins/bootstrap/css/bootstrap-rtl.min.css',
  'public/css/plugins-rtl.css',
  'public/css/components-rtl.css',
  'public/css/default.css',
  'public/css/custom.css'
], 'public/dist/css/style-rtl.css').version();

mix.scripts([
  'public/plugins/jquery.min.js',
  'public/plugins/jquery-migrate.min.js',
  'public/plugins/bootstrap/js/bootstrap.min.js',
  'public/plugins/cubeportfolio/js/jquery.cubeportfolio.min.js',
  'public/plugins/counterup/jquery.counterup.min.js',
  'public/plugins/fancybox/jquery.fancybox.pack.js',
  'public/plugins/slider-for-bootstrap/js/bootstrap-slider.js',
  'public/plugins/zoom-master/jquery.zoom.min.js',
  'public/plugins/revo-slider/js/jquery.themepunch.tools.min.js',
  'public/plugins/revo-slider/js/jquery.themepunch.revolution.min.js',
  'public/js/components.js',
  'public/js/components-shop.js',
  'public/js/app.js'
], 'public/dist/js/script.js').version();

mix.copyDirectory('public/plugins/bootstrap/fonts', 'public/dist/fonts');
mix.copyDirectory('public/plugins/simple-line-icons/fonts', 'public/dist/fonts');
mix.copyDirectory('public/plugins/font-awesome/fonts', 'public/dist/fonts');
mix.copyDirectory('public/plugins/revo-slider/fonts', 'public/dist/fonts');
mix.copyDirectory('public/plugins/revo-slider/js/extensions', 'public/extensions');

mix.copyDirectory('public/img', 'public/dist/img');
mix.copyDirectory('public/plugins/rs-plugin/img', 'public/dist/img');

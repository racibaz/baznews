let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application, as well as bundling up your JS files.
 |
 */

//mix.js('src/app.js', 'dist/') .sass('src/app.scss', 'dist/');

mix.js('resources/assets/js/app.js', 'js/') .sass('resources/assets/sass/app.scss', 'css/');

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

//CSS Component
mix.copy('node_modules/components-font-awesome/**', 'public/themes/news-theme/assets/css/font-awesome');





// Full API
// mix.js(src, output);
// mix.react(src, output); <-- Identical to mix.js(), but registers React Babel compilation.
// mix.extract(vendorLibs);
// mix.sass(src, output);
// mix.standaloneSass('src', output); <-- Faster, but isolated from Webpack.
// mix.less(src, output);
// mix.stylus(src, output);
// mix.browserSync('my-site.dev');
// mix.combine(files, destination);
// mix.babel(files, destination); <-- Identical to mix.combine(), but also includes Babel compilation.
// mix.copy(from, to);
// mix.copyDirectory(fromDir, toDir);
// mix.minify(file);
// mix.sourceMaps(); // Enable sourcemaps
// mix.version(); // Enable versioning.
// mix.disableNotifications();
// mix.setPublicPath('path/to/public');
// mix.setResourceRoot('prefix/for/resource/locators');
// mix.autoload({}); <-- Will be passed to Webpack's ProvidePlugin.
// mix.webpackConfig({}); <-- Override webpack.config.js, without editing the file directly.
// mix.then(function () {}) <-- Will be triggered each time Webpack finishes building.
// mix.options({
//   extractVueStyles: false, // Extract .vue component styling to file, rather than inline.
//   processCssUrls: true, // Process/optimize relative stylesheet url()'s. Set to false, if you don't want them touched.
//   purifyCss: false, // Remove unused CSS selectors.
//   uglify: {}, // Uglify-specific options. https://webpack.github.io/docs/list-of-plugins.html#uglifyjsplugin
//   postCss: [] // Post-CSS options: https://github.com/postcss/postcss/blob/master/docs/plugins.md
// });

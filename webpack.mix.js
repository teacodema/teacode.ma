const mix = require('laravel-mix');
require('laravel-mix-purgecss');


/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/externals.sass', 'public/css')
    .sass('resources/sass/app.sass', 'public/css')
    .purgeCss({
        extend: {
            content: [path.join(__dirname, 'database/data/**/*.json')],
        },
    })
    // .postCss()

    .sourceMaps(true, 'source-map')
    
    /* Tools */
    .browserSync('localhost:8000')
    .disableNotifications()
    /* Options */
    .options({
        processCssUrls: false
    });


if (mix.inProduction()) {
    mix.version();
}

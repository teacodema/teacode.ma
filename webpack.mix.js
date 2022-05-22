const mix = require('laravel-mix');
require('laravel-mix-purgecss');


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

mix
    .js('resources/js/app.js', 'public/js')
    .js('resources/js/extra/admin.app.js', 'public/js')
    .sass('resources/sass/externals.sass', 'public/css')
    .sass('resources/sass/app.sass', 'public/css')
    .copy('node_modules/@fortawesome/fontawesome-free/webfonts', 'public/webfonts')
    .copy('resources/assets', 'public/assets')
    .purgeCss({
        extend: {
            content: [path.join(__dirname, 'database/data/**/*.json'),
                        path.join(__dirname, 'resources/js/**/*.js'),
                        path.join(__dirname, 'node_modules/fullcalendar/main.min.js')
                    ],
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

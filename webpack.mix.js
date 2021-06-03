const mix = require("laravel-mix");

mix.js("resources/js/app.js", "public/js")
    .sass("resources/sass/app.scss", "public/css")
    .copyDirectory('node_modules/@fortawesome/fontawesome-free/webfonts', 'public/webfonts')
    .version();
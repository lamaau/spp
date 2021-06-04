const mix = require("laravel-mix");

mix.js("resources/js/app.js", "public/js")
    .sass("resources/sass/app.scss", "public/css")
    .copyDirectory('node_modules/@fortawesome/fontawesome-free/webfonts', 'public/webfonts')
    .copyDirectory('node_modules/bs4-summernote/src/icons', 'public/css/icons')
    .copyDirectory('node_modules/bs4-summernote/dist/font', 'public/css/fonts/summernote')
    .combine('resources/css/*.css', 'public/css/template.css')
    .version();
const process = require("process");
const mix = require("laravel-mix");
const cssImport = require("postcss-import");
const cssNesting = require("postcss-nesting");
const webpackConfig = require("./webpack.config");

mix
  .js("resources/js/app.js", "public/js")
  .vue({
    runtimeOnly: (process.env.NODE_ENV || "production") === "production",
  })
  .webpackConfig(webpackConfig)
  .postCss("resources/css/app.css", "public/css", [
    cssImport(),
    cssNesting(),
    require("tailwindcss"),
  ])
  .version()
  .sourceMaps();

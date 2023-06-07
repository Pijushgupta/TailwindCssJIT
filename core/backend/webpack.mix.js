let mix = require('laravel-mix');
mix.js("src/app.js","dist").vue();
mix.postCss("src/app.css", "dist", [
    require("tailwindcss"),
  ]);
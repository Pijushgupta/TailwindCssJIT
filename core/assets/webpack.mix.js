let mix = require('laravel-mix');
mix.setPublicPath('../../dist');
mix.postCss("main.css", "main.css", [
    require("tailwindcss"),
  ]);
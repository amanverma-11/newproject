let mix = require("laravel-mix");

mix.js("resources/js/app.js", "public/js", "resources/js/ziggy.js").css(
    "resources/css/app.css",
    "public/css",
    [require("tailwindcss")]
);

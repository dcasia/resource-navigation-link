const mix = require('laravel-mix')

require('./nova.mix')
require('mix-tailwindcss')

mix.setPublicPath('dist')
    .options({
        postCss:[
            require('tailwindcss/nesting')
        ]
    })
    .js('resources/js/card.js', 'js')
    .vue({ version: 3 })
    .postCss('resources/css/card.css', 'css')
    .tailwind()
    .nova('digital-creative/resource-navigation-link')

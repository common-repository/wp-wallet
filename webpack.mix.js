// webpack.mix.js
let mix = require('laravel-mix');

mix.js('src/js/wp-wallet-admin.js', 'admin/js')
.vue()
.sass('src/sass/wp-wallet-admin.scss', 'admin/css')
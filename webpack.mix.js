const mix = require('laravel-mix');

mix.ts('assets/js/controller/appController.ts', 'public/js')
    .ts('assets/js/controller/adminController.ts', 'public/js')
    .ts('assets/js/controller/baseController.ts', 'public/js')
    .vue()
    .sass('assets/sass/app/appController.scss', 'public/css')
    .sass('assets/sass/admin/adminController.scss', 'public/css')
    .sass('assets/sass/baseController.scss', 'public/css')
    .sass('assets/sass/app/homeController.scss', 'public/css')
    .sass('assets/sass/app/shop.scss', 'public/css')

mix.copy('assets/resource/img', 'public/images')
mix.copy('assets/resource/img/colissend/favicon', 'public/images')

const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

// mix.js('resources/js/app.js', 'public/js')
//     .postCss('resources/css/app.css', 'public/css', [
//         //
//     ]);
mix.styles([
    'resources/plugins/fontawesome-free/css/all.min.css',
    'resources/plugins/daterangepicker/daterangepicker.css',
    'resources/plugins/select2/css/select2.min.css',
    'resources/dist/css/adminlte.min.css',
    'resources/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css',
    'resources/plugins/datatables-responsive/css/responsive.bootstrap4.min.css',
    'resources/plugins/datatables-buttons/css/buttons.bootstrap4.min.css',
    'resources/plugins/toastr/toastr.min.css',
    'resources/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css'
], 'public/css/all.css').scripts([
    'resources/plugins/jquery/jquery.min.js',
    'resources/plugins/bootstrap/js/bootstrap.bundle.min.js',
    'resources/dist/js/adminlte.min.js',
    'resources/dist/js/demo.js',
    'resources/plugins/select2/js/select2.full.min.js',
    'resources/plugins/daterangepicker/daterangepicker.js',
    'resources/plugins/moment/moment.min.js',
    'resources/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js',
    'resources/plugins/datatables/jquery.dataTables.min.js',
    'resources/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js',
    'resources/plugins/datatables-responsive/js/dataTables.responsive.min.js',
    'resources/plugins/datatables-responsive/js/responsive.bootstrap4.min.js',
    'resources/plugins/datatables-buttons/js/dataTables.buttons.min.js',
    'resources/plugins/datatables-buttons/js/buttons.bootstrap4.min.js',
    'resources/plugins/pdfmake/pdfmake.min.js',
    'resources/plugins/datatables-buttons/js/buttons.print.min.js',
    'resources/plugins/toastr/toastr.min.js',
    'resources/plugins/sweetalert2/sweetalert2.min.js',
    'resources/plugins/dropzone/min/dropzone.min.js'
], 'public/js/all.js').copy(
    'resources/plugins/fontawesome-free/webfonts',
    'public/webfonts'
);



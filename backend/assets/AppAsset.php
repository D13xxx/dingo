<?php

namespace backend\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.4/croppie.min.css',
        'theme1/plugins/bootstrap/dist/css/bootstrap.min.css',
        'theme1/plugins/fontawesome-free/css/all.min.css',
        'theme1/plugins/icon-kit/dist/css/iconkit.min.css',
        'theme1/plugins/ionicons/dist/css/ionicons.min.css',
        'theme1/plugins/perfect-scrollbar/css/perfect-scrollbar.css',
        'theme1/plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css',
        'theme1/plugins/jvectormap/jquery-jvectormap.css',
        'theme1/plugins/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css',
        'theme1/plugins/weather-icons/css/weather-icons.min.css',
        'theme1/plugins/c3/c3.min.css',
        'theme1/plugins/owl.carousel/dist/assets/owl.carousel.min.css',
        'theme1/plugins/owl.carousel/dist/assets/owl.theme.default.min.css',
        'theme1/dist/css/theme.min.css',
        'css/site.css'
    ];
    public $js = [
        'js/app.js?v1',
        'js/crop.js?v=1',
        'js/crop-parter.js?v=1',
        'them1/src/js/vendor/modernizr-2.8.3.min.js',
        'https://code.jquery.com/jquery-3.3.1.min.js',
//        'https://code.jquery.com/jquery-1.12.4.min.js',
        'theme1/plugins/popper.js/dist/umd/popper.min.js',
        'theme1/plugins/bootstrap/dist/js/bootstrap.min.js',
        'theme1/plugins/perfect-scrollbar/dist/perfect-scrollbar.min.js',
        'theme1/plugins/screenfull/dist/screenfull.js',
        'theme1/plugins/datatables.net/js/jquery.dataTables.min.js',
        'theme1/plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js',
        'theme1/plugins/datatables.net-responsive/js/dataTables.responsive.min.js',
        'theme1/plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js',
        'theme1/plugins/jvectormap/jquery-jvectormap.min.js',
        // 'https://cdnjs.cloudflare.com/ajax/libs/jvectormap/2.0.4/jquery-jvectormap.min.css',
//        'theme1/plugins/jvectormap/tests/assets/jquery-jvectormap-world-mill-en.js',
        'theme1/plugins/moment/moment.js',
        'theme1/plugins/tempusdominus-bootstrap-4/build/js/tempusdominus-bootstrap-4.min.js',
        'theme1/plugins/d3/dist/d3.min.js',
        'theme1/plugins/c3/c3.min.js',
        'theme1/js/tables.js',
        'theme1/js/widgets.js',
        'theme1/js/charts.js',
        'theme1/dist/js/theme.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.4/croppie.js?v=2',
        'https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.4/croppie.min.js?v=2',
    ];
    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}

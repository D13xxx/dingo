<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'theme/css/bootstrap.min.css',
        'theme/css/animate.css',
        'theme/css/owl.carousel.min.css',
        'theme/css/themify-icons.css',
        'theme/css/flaticon.css',
        'theme/css/magnific-popup.css',
        'theme/css/slick.css',
        'theme/css/gijgo.min.css',
        'theme/css/nice-select.css',
        'theme/css/all.css',
        'theme/css/style.css',
    ];
    public $js = [
        'theme/js/jquery-1.12.1.min.js',
        'theme/js/popper.min.js',
        'theme/js/bootstrap.min.js',
        'theme/js/jquery.magnific-popup.js',
        'theme/js/swiper.min.js',
        'theme/js/masonry.pkgd.js',
        'theme/js/owl.carousel.min.js',
        'theme/js/slick.min.js',
        'theme/js/gijgo.min.js',
        'theme/js/jquery.nice-select.min.js',
        'theme/js/custom.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
//        'yii\bootstrap\BootstrapAsset',
    ];
}
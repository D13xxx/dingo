<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'vi',
    'controllerNamespace' => 'frontend\controllers',
    'modules'=>[
        'pdfjs' => [
            'class' => '\yii2assets\pdfjs\Module',
        ],
    ],
    'components' => [
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            // 'errorAction' => 'site/error',
        ],
        // 'assetManager' => [
        //     'forceCopy' => true,
        //     'linkAssets' => false,
        // ],
        //        'urlManagerBackend' => [
        //            'class' => 'yii\web\urlManager',
        //            'baseUrl' => 'http://cms.baohiemso.net/upload/',
        //            'enablePrettyUrl' => true,
        //            'showScriptName' => false,
        //        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                // ['class' => 'yii\rest\UrlRule', 'controller' => 'Vnptpay'],
                '/boi-thuong.html'=>'/offset/index',
                '/ve-chung-toi.html'=>'/site/about-us',
                '/hop-dong.html' => '/site/contract',
                '/request-password-reset'=>'site/request-password-reset',
                '/hoa-don/<acc:[\w-]+>.html'=>'site/hoa-don',
                '/cap-nhat-ho-so/<id:[\w-]+>&&<cellPhone:[\w-]+>'=>'contract/cap-nhat-ho-so',
                '/goc-chuyen-gia.html'=>'/articles/list-articles',
                '/danh-sach-bao-hiem.html'=>'/products/list-products-all',
                '/nhom-bao-hiem/<code:[\w-]+>.html'=>'/products/list-products',
                '/bao-hiem/<slug:[\w-]+>.html' =>'products/view',
                '/<slug:[\w-]+>.html' =>'articles/view',
                '/nhom-tin/<code:[\w-]+>.html'=>'articles/list-articles-cat',
                '/tags'=>'articles/list-articles-tags',
            ],
        ],
    ],
    'params' => $params,
];

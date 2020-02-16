<?php

/* @var $this yii\web\View */

use common\models\CatArticles;
use yii\helpers\Html;
use yii\helpers\Url;
use common\models\Products;
$this->title = 'Bảo Hiểm Số - Bảo Hiểm Online';
\Yii::$app->view->registerMetaTag([
    'name' => 'title',
    'content' =>'Bảo Hiểm Số - Bảo Hiểm Online',
]);
\Yii::$app->view->registerMetaTag([
    'name' => 'description',
    'content' => 'Bảo Hiểm Số cung cấp giải pháp bảo hiểm trên nền tảng công nghệ: tạo lập hợp đồng online, thanh toán đa kênh tiện lợi. Sản phẩm cốt lõi: bảo hiểm tai nạn cá nhân, bảo hiểm viện phí,...',
]);
\Yii::$app->view->registerMetaTag([
    'property' => 'og:title',
    'content' => 'Bảo Hiểm Số - Bảo Hiểm Online',
]);
\Yii::$app->view->registerMetaTag([
    'property' => 'og:description',
    'content' => 'Bảo Hiểm Số cung cấp giải pháp bảo hiểm trên nền tảng công nghệ: tạo lập hợp đồng online, thanh toán đa kênh tiện lợi. Sản phẩm cốt lõi: bảo hiểm tai nạn cá nhân, bảo hiểm viện phí,...',
]);
\Yii::$app->view->registerMetaTag([
    'property' => 'og:image',
    'content' => 'http://baohiemso.net/media/banner/Cover-BHS.jpg',
]);
\Yii::$app->view->registerMetaTag([
    'property' => 'og:url',
    'content' => 'http://baohiemso.net/',
]);
\Yii::$app->view->registerMetaTag([
    'rel' => 'canonical',
    'content' => 'http://baohiemso.net/',
]);

?>
<!-- breadcrumb start-->
<section class="breadcrumb breadcrumb_bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_iner text-center">
                    <div class="breadcrumb_iner_item">
                        <h2>Food Menu</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb start-->

<!--::chefs_part start::-->
<!-- food_menu start-->
<section class="food_menu gray_bg">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="section_tittle">
                    <p>Popular Menu</p>
                    <h2>Delicious Food Menu</h2>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="nav nav-tabs food_menu_nav" id="myTab" role="tablist">
                    <a class="active" id="Special-tab" data-toggle="tab" href="#Special" role="tab"
                       aria-controls="Special" aria-selected="false">Special <img src="/theme/img/icon/play.svg"
                                                                                  alt="play"></a>
                    <a id="Breakfast-tab" data-toggle="tab" href="#Breakfast" role="tab" aria-controls="Breakfast"
                       aria-selected="false">Breakfast <img src="/theme/img/icon/play.svg" alt="play"></a>
                    <a id="Launch-tab" data-toggle="tab" href="#Launch" role="tab" aria-controls="Launch"
                       aria-selected="false">Launch <img src="/theme/img/icon/play.svg" alt="play"></a>
                    <a id="Dinner-tab" data-toggle="tab" href="#Dinner" role="tab" aria-controls="Dinner"
                       aria-selected="false">Dinner <img src="/theme/img/icon/play.svg" alt="play"> </a>
                    <a id="Sneaks-tab" data-toggle="tab" href="#Sneaks" role="tab" aria-controls="Sneaks"
                       aria-selected="false">Sneaks <img src="/theme/img/icon/play.svg" alt="play"></a>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active single-member" id="Special" role="tabpanel"
                         aria-labelledby="Special-tab">
                        <div class="row">
                            <div class="col-sm-6 col-lg-6">
                                <div class="single_food_item media">
                                    <img src="/theme/img/food_menu/single_food_1.png" class="mr-3" alt="...">
                                    <div class="media-body align-self-center">
                                        <h3>Pork Sandwich</h3>
                                        <p>They're wherein heaven seed hath nothing</p>
                                        <h5>$40.00</h5>
                                    </div>
                                </div>
                                <div class="single_food_item media">
                                    <img src="/theme/img/food_menu/single_food_2.png" class="mr-3" alt="...">
                                    <div class="media-body align-self-center">
                                        <h3>Roasted Marrow</h3>
                                        <p>They're wherein heaven seed hath nothing</p>
                                        <h5>$40.00</h5>
                                    </div>
                                </div>
                                <div class="single_food_item media">
                                    <img src="/theme/img/food_menu/single_food_3.png" class="mr-3" alt="...">
                                    <div class="media-body align-self-center">
                                        <h3>Summer Cooking</h3>
                                        <p>They're wherein heaven seed hath nothing</p>
                                        <h5>$40.00</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6">
                                <div class="single_food_item media">
                                    <img src="/theme/img/food_menu/single_food_4.png" class="mr-3" alt="...">
                                    <div class="media-body align-self-center">
                                        <h3>Easter Delight</h3>
                                        <p>They're wherein heaven seed hath nothing</p>
                                        <h5>$40.00</h5>
                                    </div>
                                </div>
                                <div class="single_food_item media">
                                    <img src="/theme/img/food_menu/single_food_5.png" class="mr-3" alt="...">
                                    <div class="media-body align-self-center">
                                        <h3>Tiener Schnitze</h3>
                                        <p>They're wherein heaven seed hath nothing</p>
                                        <h5>$40.00</h5>
                                    </div>
                                </div>
                                <div class="single_food_item media">
                                    <img src="/theme/img/food_menu/single_food_6.png" class="mr-3" alt="...">
                                    <div class="media-body align-self-center">
                                        <h3>Chicken Roast</h3>
                                        <p>They're wherein heaven seed hath nothing</p>
                                        <h5>$40.00</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade single-member" id="Breakfast" role="tabpanel"
                         aria-labelledby="Breakfast-tab">
                        <div class="row">
                            <div class="col-sm-6 col-lg-6">
                                <div class="single_food_item media">
                                    <img src="/theme/img/food_menu/single_food_4.png" class="mr-3" alt="...">
                                    <div class="media-body align-self-center">
                                        <h3>Easter Delight</h3>
                                        <p>They're wherein heaven seed hath nothing</p>
                                        <h5>$40.00</h5>
                                    </div>
                                </div>
                                <div class="single_food_item media">
                                    <img src="/theme/img/food_menu/single_food_5.png" class="mr-3" alt="...">
                                    <div class="media-body align-self-center">
                                        <h3>Tiener Schnitze</h3>
                                        <p>They're wherein heaven seed hath nothing</p>
                                        <h5>$40.00</h5>
                                    </div>
                                </div>
                                <div class="single_food_item media">
                                    <img src="/theme/img/food_menu/single_food_6.png" class="mr-3" alt="...">
                                    <div class="media-body align-self-center">
                                        <h3>Chicken Roast</h3>
                                        <p>They're wherein heaven seed hath nothing</p>
                                        <h5>$40.00</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6">
                                <div class="single_food_item media">
                                    <img src="/theme/img/food_menu/single_food_1.png" class="mr-3" alt="...">
                                    <div class="media-body align-self-center">
                                        <h3>Pork Sandwich</h3>
                                        <p>They're wherein heaven seed hath nothing</p>
                                        <h5>$40.00</h5>
                                    </div>
                                </div>
                                <div class="single_food_item media">
                                    <img src="/theme/img/food_menu/single_food_2.png" class="mr-3" alt="...">
                                    <div class="media-body align-self-center">
                                        <h3>Roasted Marrow</h3>
                                        <p>They're wherein heaven seed hath nothing</p>
                                        <h5>$40.00</h5>
                                    </div>
                                </div>
                                <div class="single_food_item media">
                                    <img src="/theme/img/food_menu/single_food_3.png" class="mr-3" alt="...">
                                    <div class="media-body align-self-center">
                                        <h3>Summer Cooking</h3>
                                        <p>They're wherein heaven seed hath nothing</p>
                                        <h5>$40.00</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade single-member" id="Launch" role="tabpanel"
                         aria-labelledby="Launch-tab">
                        <div class="row">
                            <div class="col-sm-6 col-lg-6">
                                <div class="single_food_item media">
                                    <img src="/theme/img/food_menu/single_food_1.png" class="mr-3" alt="...">
                                    <div class="media-body align-self-center">
                                        <h3>Pork Sandwich</h3>
                                        <p>They're wherein heaven seed hath nothing</p>
                                        <h5>$40.00</h5>
                                    </div>
                                </div>
                                <div class="single_food_item media">
                                    <img src="/theme/img/food_menu/single_food_2.png" class="mr-3" alt="...">
                                    <div class="media-body align-self-center">
                                        <h3>Roasted Marrow</h3>
                                        <p>They're wherein heaven seed hath nothing</p>
                                        <h5>$40.00</h5>
                                    </div>
                                </div>
                                <div class="single_food_item media">
                                    <img src="/theme/img/food_menu/single_food_3.png" class="mr-3" alt="...">
                                    <div class="media-body align-self-center">
                                        <h3>Summer Cooking</h3>
                                        <p>They're wherein heaven seed hath nothing</p>
                                        <h5>$40.00</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6">
                                <div class="single_food_item media">
                                    <img src="/theme/img/food_menu/single_food_4.png" class="mr-3" alt="...">
                                    <div class="media-body align-self-center">
                                        <h3>Easter Delight</h3>
                                        <p>They're wherein heaven seed hath nothing</p>
                                        <h5>$40.00</h5>
                                    </div>
                                </div>
                                <div class="single_food_item media">
                                    <img src="/theme/img/food_menu/single_food_5.png" class="mr-3" alt="...">
                                    <div class="media-body align-self-center">
                                        <h3>Tiener Schnitze</h3>
                                        <p>They're wherein heaven seed hath nothing</p>
                                        <h5>$40.00</h5>
                                    </div>
                                </div>
                                <div class="single_food_item media">
                                    <img src="/theme/img/food_menu/single_food_6.png" class="mr-3" alt="...">
                                    <div class="media-body align-self-center">
                                        <h3>Chicken Roast</h3>
                                        <p>They're wherein heaven seed hath nothing</p>
                                        <h5>$40.00</h5>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="tab-pane fade single-member" id="Dinner" role="tabpanel"
                         aria-labelledby="Dinner-tab">
                        <div class="row">
                            <div class="col-sm-6 col-lg-6">
                                <div class="single_food_item media">
                                    <img src="/theme/img/food_menu/single_food_4.png" class="mr-3" alt="...">
                                    <div class="media-body align-self-center">
                                        <h3>Easter Delight</h3>
                                        <p>They're wherein heaven seed hath nothing</p>
                                        <h5>$40.00</h5>
                                    </div>
                                </div>
                                <div class="single_food_item media">
                                    <img src="/theme/img/food_menu/single_food_5.png" class="mr-3" alt="...">
                                    <div class="media-body align-self-center">
                                        <h3>Tiener Schnitze</h3>
                                        <p>They're wherein heaven seed hath nothing</p>
                                        <h5>$40.00</h5>
                                    </div>
                                </div>
                                <div class="single_food_item media">
                                    <img src="/theme/img/food_menu/single_food_6.png" class="mr-3" alt="...">
                                    <div class="media-body align-self-center">
                                        <h3>Chicken Roast</h3>
                                        <p>They're wherein heaven seed hath nothing</p>
                                        <h5>$40.00</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6">
                                <div class="single_food_item media">
                                    <img src="/theme/img/food_menu/single_food_1.png" class="mr-3" alt="...">
                                    <div class="media-body align-self-center">
                                        <h3>Pork Sandwich</h3>
                                        <p>They're wherein heaven seed hath nothing</p>
                                        <h5>$40.00</h5>
                                    </div>
                                </div>
                                <div class="single_food_item media">
                                    <img src="/theme/img/food_menu/single_food_2.png" class="mr-3" alt="...">
                                    <div class="media-body align-self-center">
                                        <h3>Roasted Marrow</h3>
                                        <p>They're wherein heaven seed hath nothing</p>
                                        <h5>$40.00</h5>
                                    </div>
                                </div>
                                <div class="single_food_item media">
                                    <img src="/theme/img/food_menu/single_food_3.png" class="mr-3" alt="...">
                                    <div class="media-body align-self-center">
                                        <h3>Summer Cooking</h3>
                                        <p>They're wherein heaven seed hath nothing</p>
                                        <h5>$40.00</h5>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="tab-pane fade single-member" id="Sneaks" role="tabpanel"
                         aria-labelledby="Sneaks-tab">
                        <div class="row">
                            <div class="col-sm-6 col-lg-6">
                                <div class="single_food_item media">
                                    <img src="/theme/img/food_menu/single_food_1.png" class="mr-3" alt="...">
                                    <div class="media-body align-self-center">
                                        <h3>Pork Sandwich</h3>
                                        <p>They're wherein heaven seed hath nothing</p>
                                        <h5>$40.00</h5>
                                    </div>
                                </div>
                                <div class="single_food_item media">
                                    <img src="/theme/img/food_menu/single_food_2.png" class="mr-3" alt="...">
                                    <div class="media-body align-self-center">
                                        <h3>Roasted Marrow</h3>
                                        <p>They're wherein heaven seed hath nothing</p>
                                        <h5>$40.00</h5>
                                    </div>
                                </div>
                                <div class="single_food_item media">
                                    <img src="/theme/img/food_menu/single_food_3.png" class="mr-3" alt="...">
                                    <div class="media-body align-self-center">
                                        <h3>Summer Cooking</h3>
                                        <p>They're wherein heaven seed hath nothing</p>
                                        <h5>$40.00</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6">
                                <div class="single_food_item media">
                                    <img src="/theme/img/food_menu/single_food_4.png" class="mr-3" alt="...">
                                    <div class="media-body align-self-center">
                                        <h3>Easter Delight</h3>
                                        <p>They're wherein heaven seed hath nothing</p>
                                        <h5>$40.00</h5>
                                    </div>
                                </div>
                                <div class="single_food_item media">
                                    <img src="/theme/img/food_menu/single_food_5.png" class="mr-3" alt="...">
                                    <div class="media-body align-self-center">
                                        <h3>Tiener Schnitze</h3>
                                        <p>They're wherein heaven seed hath nothing</p>
                                        <h5>$40.00</h5>
                                    </div>
                                </div>
                                <div class="single_food_item media">
                                    <img src="/theme/img/food_menu/single_food_6.png" class="mr-3" alt="...">
                                    <div class="media-body align-self-center">
                                        <h3>Chicken Roast</h3>
                                        <p>They're wherein heaven seed hath nothing</p>
                                        <h5>$40.00</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- food_menu part end-->
<!--::chefs_part end::-->

<!-- intro_video_bg start-->
<section class="intro_video_bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="intro_video_iner text-center">
                    <h2>Expect The Best</h2>
                    <div class="intro_video_icon">
                        <a id="play-video_1" class="video-play-button popup-youtube"
                           href="https://www.youtube.com/watch?v=pBFQdxA-apI">
                            <span class="ti-control-play"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- intro_video_bg part start-->
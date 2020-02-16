<?php

use yii\widgets\LinkPager;
use yii\helpers\Url;

$this->title = 'Góc Chuyên Gia | Bảo Hiểm Số';
\Yii::$app->view->registerMetaTag([
    'name' => 'title',
    'content' => 'Góc Chuyên Gia | Bảo Hiểm Số',
]);
\Yii::$app->view->registerMetaTag([
    'name' => 'description',
    'content' => 'Góc chuyên gia của Bảo Hiểm Số chuyên cung cấp các thông tin mới nhất về tin tức, bảo hiểm, thủ thuật và khuyến mãi',
]);
\Yii::$app->view->registerMetaTag([
    'property' => 'og:title',
    'content' => 'Góc Chuyên Gia | Bảo Hiểm Số',
]);
\Yii::$app->view->registerMetaTag([
    'property' => 'og:description',
    'content' => 'Góc chuyên gia của Bảo Hiểm Số chuyên cung cấp các thông tin mới nhất về tin tức, bảo hiểm, thủ thuật và khuyến mãi',
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

<style>
    b.author {
        display: block;
        font-size: 14px;
        color: brown;
        padding: 10px 10px 5px 0px;
        text-transform: uppercase;
    }

    span.time-created {
        font-weight: 400;
        padding-left: 10px;
    }

    /* new desgin */

    .new-feeds {
        width: 100%;
        height: 400px;
        margin-bottom: 30px;
    }

    .new-feed-left {
        width: 50%;
        float: left;
        height: 100%;
        position: relative;
    }

    .new-feed-left img {
        width: 100%;
        height: 100%;
        z-index: 1;
        max-width: 100%;
    }

    .title-new-feeds {
        position: absolute;
        bottom: 0;
        z-index: 99;
        width: 100%;
        padding: 30px 20px 40px 20px;
        background-image: linear-gradient(to right, rgba(63, 174, 226, 0.85), rgba(13, 77, 135, 0.85));
    }

    .new-feed-right {
        width: 50%;
        float: right;
    }

    .title-new-feeds a {
        display: block;
    }

    .top-new-feed-right {
        width: 100%;
        height: 400px;
        overflow: hidden;
    }

    .top-new-feed-right-1 {
        width: 50%;
        float: left;
        height: 200px;
        position: relative;
    }

    .top-new-feed-right-1 img {
        height: 100%;
        max-width: 100%;
        width: 100%;
        z-index: 1;
    }

    .button-new-feed-right {
        width: 100%;
        height: 200px;
        overflow: hidden;
    }

    .title-new-feeds-right {
        width: 100%;
        z-index: 99;
        position: absolute;
        bottom: 0;
        padding: 5%;
        /* background: aquamarine; */
        /* background-image: linear-gradient(#9434a1, #0e1f38); */
        height: 100%;
        background: rgba(13, 77, 135, 0.85);
        /* opacity: 0.88; */
    }

    a.title-articles {
        font-family: "GothamMedium";
        font-size: 18px;
        line-height: 1.3em;
        color: #fff;
    }

    .title-new-feeds-right a {
        display: block;
    }

    a.cat-articles {
        text-transform: uppercase;
        font-size: 14px;
        color: #faff00;
        font-weight: 600;
        padding-bottom: 10px;
    }

    a.title-articles:hover {
        color: #f3d1a3;
    }

    /* .col-md-12 .row{
        display: block;
    } */
    @media only screen and (max-width: 992px) {
        .new-feeds {
            width: 100%;
            height: auto;
            margin-bottom: 30px;
        }

        .new-feed-right {
            width: 100%;
            float: right;
        }

        .new-feed-left {
            width: 100%;
            float: right;
        }

        .top-new-feed-right {
            height: auto;
        }

        .col-md-12 .row {
            display: block;
        }
    }

    @media only screen and (max-width: 600px) {
        .new-feeds {
            width: 100%;
            height: auto;
            margin-bottom: 30px;
        }

        .col-md-12 .row {
            display: block;
        }

        .top-new-feed-right-1 {
            width: 100%;
            float: left;
            height: 100%;
            position: relative;
        }

        .top-new-feed-right {
            height: auto;
        }

        .title-new-feeds {
            padding: 10px 20px 10px 20px;
        }
    }

    .newletter {
        background-size: cover;
        padding: 15px 0px;
        text-align: center;
        border: 2px solid gainsboro;
    }

    .newletter h3 a img {
        width: 30px;
    }

    .newletter h3 a {
        font-size: 21px;
    }

    .newletter h3 {
        margin-bottom: 0 !important;
    }

    .an-chi-bao-hiem h3 {
        padding: 15px 0px;
        text-align: center;
    }

    .an-chi-bao-hiem {
        background-image: url('/upload/bg-an-chi-bao-hiem.png');
    }

    .an-chi-bao-hiem h3 {
        padding: 15px 0px;
        text-align: center;
    }

    .an-chi-bao-hiem h3 a {
        color: #ffff !important;
        font-size: 21px;
    }

    .dang-ky-ngay {
        background-image: url('/upload/bg-dang-ky-ngay.png');
    }

    .dang-ky-ngay h3 a {
        color: #ffff !important;
        font-size: 21px;
    }

    .dang-ky-ngay h3 {
        padding: 15px 0px;
        text-align: center;
    }
</style>
<div class="banner_main bk-detail-product">
    <div class="breadcrumb">
        <p>
            <a href="#">Góc chuyên gia</a>
            <i class="fal fa-chevron-right"></i>
            <a href="#">Tin nổi bật</a>
        </p>
    </div>
</div>
<!-- end header -->
<div id="wrapper" class="check">

    <!-- main-content -->
    <div class="news">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="row">
                        <div class="new-feeds">
                            <div class="new-feed-left">
                                <a href="<?= \yii\helpers\Url::to(['/articles/view', 'slug' => $hotArticle->slug]) ?>" class="cat-articles"> <img src="<?= Yii::getAlias('@fakelink/articles/' . $hotArticle->avatar) ?>" class="img-new-feeds" alt="avatar"></a>
                                <div class="title-new-feeds">
                                    <a href="<?= Url::to(['/articles/list-articles-cat', 'code' => $hotArticle->catArtiles->code]) ?>" class="cat-articles"><?= $hotArticle->catArtiles->name ?></a>
                                    <h2><a href="<?= \yii\helpers\Url::to(['/articles/view', 'slug' => $hotArticle->slug]) ?>" class="title-articles"><?= ucfirst($hotArticle->title) ?></a></h2>
                                </div>
                            </div>
                            <div class="new-feed-right">
                                <div class="top-new-feed-right">
                                    <?php
                                    if (!empty($listHotArticles)) {
                                        foreach ($listHotArticles as $listHotArticle) { ?>
                                            <div class="top-new-feed-right-1">
                                                <?php
                                                if (!empty($listHotArticle->avatar)) { ?>
                                                    <img src="<?= Yii::getAlias('@fakelink/articles/' . $listHotArticle->avatar) ?>" class="img-new-feeds" alt="avatar">
                                                <?php } else { ?>
                                                    <img src="https://via.placeholder.com/300x200" id="img-new-feeds" class="img-new-feeds" alt="avatar">
                                                <?php }
                                                ?>
                                                <div class="title-new-feeds-right">
                                                    <a href="<?= Url::to(['/articles/list-articles-cat', 'code' => $listHotArticle->catArtiles->code]) ?>" class="cat-articles"><?= $listHotArticle->catArtiles->name ?></a>
                                                    <h2><a href="<?= \yii\helpers\Url::to(['/articles/view', 'slug' => $listHotArticle->slug]) ?>" class="title-articles"><?= ucfirst($listHotArticle->title) ?></a></h2>
                                                </div>
                                            </div>
                                    <?php }
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="ileft col-lg-9">
                            <?php
                            if (!empty($models)) {
                                foreach ($models as $model) { ?>
                                    <div class="item row">
                                        <div class="image col-md-6">
                                            <a href="<?= \yii\helpers\Url::to(['/articles/view', 'slug' => $model->slug]) ?>">
                                                <?php
                                                if (!empty($model->avatar)) { ?>
                                                    <img src="<?= Yii::getAlias('@fakelink/articles/' . $model->avatar) ?>" class="avatar  img-thumbnail">
                                                <?php } else { ?>
                                                    <img src="https://via.placeholder.com/300x200" id="avatarPro" class="avatar  img-thumbnail" alt="avatar">
                                                <?php }
                                                ?>
                                            </a>
                                        </div>
                                        <div class="info col-md-6">
                                            <a href="<?= \yii\helpers\Url::to(['/articles/view', 'slug' => $model->slug]) ?>" class="title">
                                                <h2><?= $model->title ?></h2>
                                            </a>
                                            <b class="author"><?= $model->catArtiles->name ?> <span class="time-created"><?= date('H:i:s d-m-Y', $model->created_at) ?></span></b>
                                            <p><?= $model->desc ? $model->desc : '' ?> …</p>
                                            <a href="<?= \yii\helpers\Url::to(['/articles/view', 'slug' => $model->slug]) ?>" class="more">Chi tiết <i class="far fa-chevron-right"></i></a>
                                        </div>
                                    </div>
                            <?php }
                            }
                            ?>

                            <nav class="page" aria-label="Page navigation example text-center">
                                <?=
                                    LinkPager::widget([
                                        'pagination' => $pages,
                                    ]);
                                ?>
                            </nav>
                        </div>
                        <div class="iright col-lg-3">
                            <h3>Góc chuyên gia</h3>
                            <ul>
                                <?php
                                if (!empty($catArticles)) {
                                    foreach ($catArticles as $catArticle) { ?>
                                        <li><a href="<?= Url::to(['/articles/list-articles-cat', 'code' => $catArticle->code]) ?>"><?= $catArticle->name ?></a></li>
                                <?php }
                                }
                                ?>
                            </ul>
                            <hr>
                            <h3>Fanpage facebook</h3>
                            <div class="facebook-fanpage">
                                <div class="fb-page" style="width: 100%;" data-href="https://www.facebook.com/baohiemsovietnam/" data-tabs="timeline" data-width="" data-height="300" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="true">
                                    <blockquote cite="https://www.facebook.com/baohiemsovietnam/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/baohiemsovietnam/">Bảo Hiểm Số Việt Nam</a></blockquote>
                                </div>
                            </div>
                            <hr>
                            <h3>Video</h3>
                            <div class="video-review" style="width: 100%;">
                                <iframe width="100%" height="" src="https://www.youtube.com/embed/ganIz0vWZ6o" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                            <hr>
                            <div class="an-chi-bao-hiem">
                                <h3><a href="#" onclick="window.open('/theme/docs/an-chi-bao-hiem.png', '_blank', 'fullscreen=yes'); return false;">Ấn chỉ Bảo Hiểm Số</a></h3>
                            </div>
                            <div class="dang-ky-ngay"">
                                <h3><a href="/danh-sach-bao-hiem.html">Đăng ký ngay</a> </h3> </div> <div class="slide">
                                
                            </div>
                            <div class="slide-products owl-carousel owl-theme owl-loaded owl-drag">
                                    <div class="owl-stage-outer owl-height" style="height: 100px;">
                                        <div class="owl-stage" style="transform: translate3d(-980px, 0px, 0px); transition: all 0.25s ease 0s; width: 11760px;">
                                            <div class="owl-item" style="width: 970px; margin-right: 10px;">
                                                <div class="item" style="height:300px">
                                                    <h4>1</h4>
                                                </div>
                                            </div>
                                            <div class="owl-item active" style="width: 970px; margin-right: 10px;">
                                                <div class="item" style="height:100px">
                                                    <h4>2</h4>
                                                </div>
                                            </div>
                                            <div class="owl-item" style="width: 970px; margin-right: 10px;">
                                                <div class="item" style="height:500px">
                                                    <h4>3</h4>
                                                </div>
                                            </div>
                                            <div class="owl-item" style="width: 970px; margin-right: 10px;">
                                                <div class="item" style="height:250px">
                                                    <h4>4</h4>
                                                </div>
                                            </div>
                                            <div class="owl-item" style="width: 970px; margin-right: 10px;">
                                                <div class="item" style="height:400px">
                                                    <h4>5</h4>
                                                </div>
                                            </div>
                                            <div class="owl-item" style="width: 970px; margin-right: 10px;">
                                                <div class="item" style="height:500px">
                                                    <h4>6</h4>
                                                </div>
                                            </div>
                                            <div class="owl-item" style="width: 970px; margin-right: 10px;">
                                                <div class="item" style="height:600px">
                                                    <h4>7</h4>
                                                </div>
                                            </div>
                                            <div class="owl-item" style="width: 970px; margin-right: 10px;">
                                                <div class="item" style="height:400px">
                                                    <h4>8</h4>
                                                </div>
                                            </div>
                                            <div class="owl-item" style="width: 970px; margin-right: 10px;">
                                                <div class="item" style="height:300px">
                                                    <h4>9</h4>
                                                </div>
                                            </div>
                                            <div class="owl-item" style="width: 970px; margin-right: 10px;">
                                                <div class="item" style="height:350px">
                                                    <h4>10</h4>
                                                </div>
                                            </div>
                                            <div class="owl-item" style="width: 970px; margin-right: 10px;">
                                                <div class="item" style="height:200px">
                                                    <h4>11</h4>
                                                </div>
                                            </div>
                                            <div class="owl-item" style="width: 970px; margin-right: 10px;">
                                                <div class="item" style="height:150px">
                                                    <h4>12</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span></button><button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button></div>
                                    <div class="owl-dots"><button role="button" class="owl-dot"><span></span></button><button role="button" class="owl-dot active"><span></span></button><button role="button" class="owl-dot"><span></span></button><button role="button" class="owl-dot"><span></span></button><button role="button" class="owl-dot"><span></span></button><button role="button" class="owl-dot"><span></span></button><button role="button" class="owl-dot"><span></span></button><button role="button" class="owl-dot"><span></span></button><button role="button" class="owl-dot"><span></span></button><button role="button" class="owl-dot"><span></span></button><button role="button" class="owl-dot"><span></span></button><button role="button" class="owl-dot"><span></span></button></div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- partner -->
    <?= $this->render('/layouts/parter') ?>
    <!-- end  parter-->

</div>
<script>
    $(".slide-products").owlCarousel({
        items: 1,
        margin: 10,
        nav: false,
        dots: true,
        autoplay: true,
        autoplayTimeout: 3000,
        smartSpeed: 250,
        // responsive: {
        //     0: {
        //         items: 1,
        //         nav: true
        //         },
        //     }
    });
</script>
<?php
use yii\widgets\LinkPager;
use yii\helpers\Url;
$this->title = 'Bảo Hiểm Số - Bảo hiểm phi nhân thọ - Bảo hiểm online';
\Yii::$app->view->registerMetaTag([
    'name' => 'title',
    'content' => 'Bảo Hiểm Số - Bảo hiểm phi nhân thọ - Bảo hiểm online',
  ]);
  \Yii::$app->view->registerMetaTag([
    'name' => 'description',
    'content' => 'Bảo Hiểm Số cung cấp giải pháp bảo hiểm trên nền tảng công nghệ: tạo lập hợp đồng online, thanh toán đa kênh tiện lợi. Sản phẩm cốt lõi: bảo hiểm tai nạn cá nhân, bảo hiểm viện phí,....',
  ]);
  \Yii::$app->view->registerMetaTag([
      'property' => 'og:title',
      'content' => 'Bảo Hiểm Số - Bảo hiểm phi nhân thọ - Bảo hiểm online',
    ]);
    \Yii::$app->view->registerMetaTag([
      'property' => 'og:description',
      'content' => 'Bảo Hiểm Số cung cấp giải pháp bảo hiểm trên nền tảng công nghệ: tạo lập hợp đồng online, thanh toán đa kênh tiện lợi. Sản phẩm cốt lõi: bảo hiểm tai nạn cá nhân, bảo hiểm viện phí,....',
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
    .page-title {
        font-size: 18px;
        font-weight: 600;
        color: #00599f;
        text-transform: uppercase;
    }
</style>
<div class="banner_main bk-detail-product">
    <div class="breadcrumb">
        <p>
            <a href="#">Góc chuyên gia</a>
            <i class="fal fa-chevron-right"></i>
            <a href="#">Câu chuyện</a>
        </p>
    </div>
</div>
<!-- end header -->
<div id="wrapper" class="check">
    <br>
    <br>
    <h1 class="page-title text-center">Kết quả tìm kiếm với từ khóa : "<?= $tag?>":</h1>
    <!-- main-content -->
    <div class="news">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="row">
                        <div class="ileft col-lg-9">
                                <?php
                                if (!empty($models)){
                                    foreach ($models as $model) {?>
                                        <div class="item row">
                                            <div class="image col-md-6">
                                                <a href="<?= \yii\helpers\Url::to(['/articles/view','slug'=>$model->articles->slug])?>">
                                                    <?php
                                                    if(!empty($model->articles->avatar)){?>
                                                        <img src="<?= Yii::getAlias('@fakelink/articles/'.$model->articles->avatar)?>" class="avatar  img-thumbnail" >
                                                    <?php }else{?>
                                                        <img src="https://via.placeholder.com/300x200" id="avatarPro"  class="avatar  img-thumbnail" alt="avatar">
                                                    <?php }
                                                    ?>
                                                </a>
                                            </div>
                                            <div class="info col-md-6">
                                                <a href="<?= \yii\helpers\Url::to(['/articles/view','slug'=>$model->articles->slug])?>" class="title"><h2><?= $model->articles->title ?></h2></a>
                                                <b class="author"><?= $model->articles->catArtiles->name ?> <span class="time-created"><?= date('H:i:s d-m-Y',$model->articles->created_at)?></span></b> 
                                                <p><?= $model->articles->desc ? $model->articles->desc : ''?> …</p>
                                                <a href="<?= \yii\helpers\Url::to(['/articles/view','slug'=>$model->articles->slug])?>" class="more">Chi tiết <i class="far fa-chevron-right"></i></a>
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
                                if (!empty($catArticles)){
                                    foreach ($catArticles as $catArticle){?>
                                        <li><a href="<?= Url::to(['/articles/list-articles-cat','code'=>$catArticle->code])?>"><?= $catArticle->name ?></a></li>
                                    <?php }
                                }
                                ?>
                            </ul>
                            <hr>
                            <h3>Fanpage facebook</h3>
                            <div class="facebook-fanpage">
                                <div class="fb-page" style="width: 100%;" data-href="https://www.facebook.com/baohiemsovietnam/" data-tabs="timeline" data-width="" data-height="400" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="true"><blockquote cite="https://www.facebook.com/baohiemsovietnam/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/baohiemsovietnam/">Bảo Hiểm Số Việt Nam</a></blockquote></div>
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
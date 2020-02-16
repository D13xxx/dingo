<?php
use yii\widgets\LinkPager;
use yii\helpers\Url;
use common\models\CatArticles;

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
            <a href="#">Tìm kiếm</a>
        </p>
    </div>
</div>
<!-- end header -->
<div id="wrapper" class="check">
    <br>
    <br>
    <h1 class="page-title text-center">Kết quả tìm kiếm với từ khóa "<?= $key?>":</h1>
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
                                                <a href="<?= \yii\helpers\Url::to(['/articles/view','slug'=>$model->slug])?>">
                                                    <?php
                                                    if(!empty($model->avatar)){?>
                                                        <img src="<?= Yii::getAlias('@fakelink/articles/'.$model->avatar)?>" class="avatar  img-thumbnail" >
                                                    <?php }else{?>
                                                        <img src="https://via.placeholder.com/300x200" id="avatarPro"  class="avatar  img-thumbnail" alt="avatar">
                                                    <?php }
                                                    ?>
                                                </a>
                                            </div>
                                            <div class="info col-md-6">
                                                <a href="<?= \yii\helpers\Url::to(['/articles/view','slug'=>$model->slug])?>" class="title"><?= $model->title ?></a>
                                                <p><?= $model->desc ? $model->desc : ''?> …</p>
                                                <a href="<?= \yii\helpers\Url::to(['/articles/view','slug'=>$model->slug])?>" class="more">Chi tiết <i class="far fa-chevron-right"></i></a>
                                            </div>
                                        </div>
                                    <?php }
                                }else{ ?>
                                    <p class="page-title text-center">Không tìm thấy kết quả. Vui lòng thử lại!</p>
                                <?php }
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
<?php

use common\models\Articles;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Articles */

$this->title = 'Chi tiết bài viết';
$this->params['breadcrumbs'][] = $this->title;
$urlDuyetTin = Url::to(['duyet-tin']);
$urlKhongDuyetTin = Url::to(['khong-duyet-tin']);
$script = <<< JS
    $(".btn-duyet-tin").on("click", function() {
        var thisCtrl = $(this);
        $.ajax({
            type: "POST",
            url: '$urlDuyetTin', // Your controller action
            data: {
                pid: thisCtrl.attr('pid'),
            },
            success: function(data){
                // if(data == 1){
                    location.reload();  
                // }
            }
        });
    })
    $(".btn-khong-duyet-tin").on("click", function() {
        var thisCtrl = $(this);
        $.ajax({
            type: "POST",
            url: '$urlKhongDuyetTin', // Your controller action
            data: {
                pid: thisCtrl.attr('pid'),
            },
            success: function(data){
                // if(data == 1){
                    location.reload();  
                // }
            }
        });
    })
JS;
$this->registerJs($script, \yii\web\View::POS_READY);
?>
<style>
    .block_thumb_slide_show img {
        width: 80% !important;
        margin-left: 10%;
    }
    .card-body table {
        width: 100% !important;
    }

    .card-body table tr td {
        padding: 5px;
    }

    .card-body img {
        width: 100% !important;
    }
</style>
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <h4 class="title"><?= ucwords($model->title) ?></h4>
                <hr>
                <b class="ik ik-clock"> <?= date("d.m.Y", $model->created_at)?></b> / <b class="ik ik-user"><a href="" class="bold"> <?= ucwords($model->user->username) ?></a></b>
                <hr>
                <p style="font-size:10px;"><?= $model->content ? $model->content : 'Nội dung trống' ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <a href="<?= Url::to(['update','id'=>$model->id])?>" class="btn btn-success btn-block">Cập nhật</a>
                <a href="<?= Url::to('index')?>" class="btn btn-primary btn-block">Quay lại</a>
            </div>
        </div>
        <div class="card">
            <div class="card-header"><h3>BÀI VIẾT LIÊN QUAN</h3></div>
            <div class="card-body">
                <div class="profiletimeline mt-0">
                    <?php
                    foreach ($modelBaiVietLienQuans as $modelBaiVietLienQuan){?>
                        <div class="sl-item">
                            <div class="sl-left"> <img src="<?= \Yii::$app->request->BaseUrl.'/upload/articles/'.$modelBaiVietLienQuan['avatar'] ?>" alt="user" class="rounded-circle"> </div>
                            <div class="sl-right">
                                <div>
                                    <a href="<?= Url::to(['articles/view','slug'=>$modelBaiVietLienQuan->slug])?>" class="link"><?= ucwords($modelBaiVietLienQuan->title) ? ucwords($modelBaiVietLienQuan->title) : ''?></a>
<!--                                    <p class="mt-10"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper </p>-->
                                </div>
                            </div>
                        </div>
                        <a href=""></a>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header"><h3>NHÓM TIN</h3></div>
            <div class="card-body">
                <div class="profiletimeline mt-0">
                    <?php
                    if (!empty($modelCats)){
                        foreach ($modelCats as $modelCat){?>
                            <?php
                            $artilesCat = \common\models\Articles::find()->where(['cat_articles_id'=>$modelCat->id])->count();
                            ?>
                            <div class="sl-item">
                                <div class="sl-right">
                                    <div>
                                        <a href="<?= Url::to(['list-articles-cat','catId'=>$modelCat->id])?>" class="link"><?= ucwords($modelCat->name) ? ucwords($modelCat->name) : ''?></a> <span class="badge badge-danger"><?= $artilesCat ? $artilesCat : 0?></span>
                                        <!--                                    <p class="mt-10"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper </p>-->
                                    </div>
                                </div>
                            </div>
                        <?php }
                    }
                    ?>

                    <?php
                    foreach ($modelBaiVietLienQuans as $modelBaiVietLienQuan){?>

                        <a href=""></a>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header"><h3>Tags</h3></div>
            <div class="card-body">
                <?php
                if (!empty($tagsNames)){
                    foreach ($tagsNames as $tagsNames=> $values){?>
                        <span class="badge badge-pill badge-primary mb-1"><?= $values ?></span>
                    <?php }
                }
                ?>
            </div>
        </div>
    </div>
</div>

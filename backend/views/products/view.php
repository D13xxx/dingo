<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Products;
/* @var $this yii\web\View */
/* @var $model common\models\Products */

$this->title = ucwords($model->full_name);

\yii\web\YiiAsset::register($this);
?>
<style>
    .post-text img {
        width: 100% !important;
        margin: 10px auto 10px !important;
    }
</style>
<div class="row">
    <div class="col-md-9">
        <div class="card">
            <div class="card-body">
                <b><?= ucwords($model->full_name)?></b>
                <hr>
                <span><?= $model->description ? ucwords($model->description) : '' ?></span>
                <hr>
                <p>
                    <?= $model->content ? ucwords($model->content) : '' ?>
                </p>

            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
            <a href="<?= \yii\helpers\Url::to(['/products/update','id'=>$model->id])?>" class="btn btn-block btn-primary">Cập nhật</a>
            <a href="<?= \yii\helpers\Url::to('/index')?>" class="btn btn-block btn-warning">Quay lại</a>
        </div>
        </div>
        <div class="card">
            <div class="card-body">
                <?php
                if (!empty($model->avatar)) { ?>
                    <img src="<?= Yii::$app->request->BaseUrl.'/upload/products/'.$model['avatar']?>" class="img-fluid rounded" alt="Cinque Terre">
                <?php } else{ ?>
                    <img src="https://via.placeholder.com/200x200" id="avatarPro"  class="img-fluid rounded" alt="avatar">
                <?php }
                ?>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <table class="table table-borderless">
                    <tbody>
                    <tr>
                        <td>Giá</td>
                        <td class="font-medium"><?= number_format($model->price) ?> (VND)</td>
                    </tr>
                    <tr>
                        <td>Phí thường niên</td>
                        <td class="font-medium"><?= number_format($model->price_date) ?> (VND)</td>
                    </tr>
                    <tr>
                        <td>Độ tuổi</td>
                        <td class="font-medium"><?= $model->age?></td>
                    </tr>
                    <tr>
                        <td>Rank</td>
                        <td class="font-medium"><?= Products::R_ARRAY()[(int)$model->rank] ?></td>
                    </tr>
                    <tr>
                        <td>Đối tác</td>
                        <td class="font-medium"><?= $model->parter->name?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
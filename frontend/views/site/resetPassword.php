<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Cập nhật mật khẩu';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banner_main bk-detail-product">
    <div class="breadcrumb">
        <p>
            <a href="#">Bảo hiểm số</a>
            <i class="fal fa-chevron-right"></i>
            <span>Cập nhật mật khẩu</span>
        </p>
    </div>
</div>
<br>
<div class="container">
    <div class="site-reset-password">
        <h1><?= Html::encode($this->title) ?></h1>

        <p>Vui lòng nhập mật khẩu mới:</p>

        <div class="row">
            <div class="col-lg-5">
                <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>

                    <?= $form->field($model, 'password')->passwordInput(['autofocus' => true]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Cập nhật', ['class' => 'btn btn-primary']) ?>
                    </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>

</div>

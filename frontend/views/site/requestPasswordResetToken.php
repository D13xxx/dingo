<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Request password reset';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banner_main bk-detail-product">
    <div class="breadcrumb">
        <p>
            <a href="#">Bảo hiểm số</a>
            <i class="fal fa-chevron-right"></i>
            <span>Quên mật khẩu</span>
        </p>
    </div>
</div>
<br>
<div class="container">
    <div class="site-request-password-reset">
        <p>Nhập email của bạn, Chúng tôi sẽ gửi thông tin thay đổi mật khẩu về email của bạn.</p>

        <div class="row">
            <div class="col-lg-6 col-lg-push-3">
                <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

                    <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

                    <div class="form-group">
                        <?= Html::submitButton('Gửi yêu cầu', ['class' => 'btn btn-primary']) ?>
                    </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>

</div>

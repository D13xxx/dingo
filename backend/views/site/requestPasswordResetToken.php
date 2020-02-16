<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Request password reset';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="registration-container">
    <div class="registration-box animated fadeInDown">
        <div class="registration-logo"></div>
        <div class="registration-body">
            <div class="registration-title"><strong>Forgot</strong> Password?</div>
            <div class="registration-subtitle">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In odio mauris, maximus ac sapien sit amet. </div>
            <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form']); ?>

            <h4>Your E-mail</h4>
            <div class="form-group">
                <div class="col-md-12">
                    <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>
                </div>
            </div>

            <div class="col-md-6">
                <?= Html::submitButton('Send', ['class' => 'btn btn-success btn-block']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
        <div class="registration-footer">
            <div class="pull-left">
                &copy; 2019 hellomedia.vn
            </div>
            <div class="pull-right">
                <a href="<?= \yii\helpers\Url::to('/site/signup')?>">Đăng ký</a> |
                <a href="<?= \yii\helpers\Url::to('/site/login')?>">Login</a> |
            </div>
        </div>
    </div>

</div>

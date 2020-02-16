<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Reset password';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="registration-container">
    <div class="registration-box animated fadeInDown">
        <div class="registration-logo"></div>
        <div class="registration-body">
            <div class="registration-title"><strong>Forgot</strong> Password?</div>
            <div class="registration-subtitle">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In odio mauris, maximus ac sapien sit amet. </div>
            <?php $form = ActiveForm::begin(['id' => 'reset-password-form']); ?>

            <h4>Your E-mail</h4>
            <div class="form-group">
                <div class="col-md-12">
                    <?= $form->field($model, 'password')->passwordInput(['autofocus' => true]) ?>
                </div>
            </div>

            <div class="col-md-6">
                <a href="<?= \yii\helpers\Url::to('sign-up')?>?>" class="btn btn-link btn-block">Đăng ký</a>
            </div>
            <div class="col-md-6">
                <button class="">Sign Up</button>
                <?= Html::submitButton('Gửi', ['class' => 'btn btn-danger btn-block']) ?>

            </div>

            <div class="form-group">
            </div>

            <?php ActiveForm::end(); ?>

            <form action="http://aqvatarius.com/themes/atlant/html/index.html" class="form-horizontal" method="post">

                <div class="form-group push-up-20">

                </div>
            </form>
        </div>
        <div class="registration-footer">
            <div class="pull-left">
                &copy; 2017 AppName
            </div>
            <div class="pull-right">
                <a href="#">About</a> |
                <a href="#">Privacy</a> |
                <a href="#">Contact Us</a>
            </div>
        </div>
    </div>

</div>

<div class="site-reset-password">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please choose your new password:</p>

    <div class="row">
        <div class="col-lg-5">

        </div>
    </div>
</div>

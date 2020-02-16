<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .auth-wrapper .authentication-form .form-group .form-control{
        padding-left: 7px !important;
    }
</style>
<div class="login-container">
    <div class="auth-wrapper">
        <div class="container-fluid h-100">
                <div class="row justify-content-md-center">
                    <div class="col-xl-4 col-xl-push-4">
                    <div class="authentication-form mx-auto">
                        <div class="logo-centered">
                            <a href="../index.html"><img src="../theme1/src/img/brand.svg" alt=""></a>
                        </div>
                        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                            <?= $form->field($model, 'password')->passwordInput() ?>
                            <div class="row">
                                <div class="col text-left">
                                    <label class="custom-control custom-checkbox">
                                        <?= $form->field($model, 'rememberMe')->checkbox() ?>
                                    </label>
                                </div>
                                <div class="col text-right">
                                    <a href="<?= \yii\helpers\Url::to('request-password-reset')?>">Forgot Password ?</a> <br>;
                                </div>
                            </div>
                            <div class="sign-btn text-center">
                                <?= Html::submitButton('Sign In', ['class' => 'btn btn-theme']) ?>
                            </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                    <div class="login-footer">
                        <div class="text-center">
                            &copy; 2019 HelloMedia.vn
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>


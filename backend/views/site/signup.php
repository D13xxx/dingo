<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'SignUp';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="panel panel-default">
    <div class="panel-body">
        <?php $form = \yii\widgets\ActiveForm::begin(); ?>
        <?php echo $form->errorSummary($model); ?>
        <div class="row">
            <div class="col-md-12">
                <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>
            </div>
        </div>
    </div>
    <div class="panel-footer">
        <?= Html::submitButton('Đăng ký', ['class' => 'btn btn-info', 'name' => 'login-button']) ?>

        <?= Html::a('Quay lại',['index'],['class'=>'btn btn-default pull-right'])?>
    </div>
    <?php ActiveForm::end(); ?>
</div>


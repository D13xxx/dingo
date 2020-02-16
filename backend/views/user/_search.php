<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\query\UserQuery */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="card">
    <div class="card-body chat-box scrollable" style="display: block;">
        <?php $form = ActiveForm::begin([
            'action' => ['index'],
            'method' => 'get',
        ]); ?>
        <div class="row">
            <div class="col-md-12">
                <?= $form->field($model, 'username') ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?php  echo $form->field($model, 'email') ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?= Html::submitButton('Tìm kiếm', ['class' => 'btn btn-primary btn-block']) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>


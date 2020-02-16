<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\AboutUs */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="panel panel-default">
    <div class="panel-body">
        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'iframe')->textarea(['maxlength' => true]) ?>

        <div class="form-group">
            <?php
            if ($model->isNewRecord){
                echo Html::submitButton('Thêm mới', ['class' => 'btn btn-success']);
            }else{
                echo Html::submitButton('Cập nhật', ['class' => 'btn btn-primary']);
            }?>
            <?= Html::a('Quay lại',['index'],['class'=>'btn btn-default pull-right'])?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>



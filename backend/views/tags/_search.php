<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\query\TagsQuery */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
    a.btn.btn-success.btn-block {
        margin-top: 21px !important;
    }
</style>

<?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
]); ?>
<div class="col-md-4">
    <?= $form->field($model, 'tag_name') ?>
</div>
<div class="col-md-6">
    <?= $form->field($model, 'articlesName') ?>
</div>
<div class="col-md-2" style="padding-top: 4px;">
    <br>
    <?= Html::submitButton('Tìm kiếm', ['class' => 'btn btn-primary btn-block btn-routed']) ?>
</div>

<?php ActiveForm::end(); ?>


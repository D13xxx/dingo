<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model common\models\query\CatArticlesQuery */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="card task-board">
    <div class="card-header">
        <h3><a href="<?= \yii\helpers\Url::to('create') ?>" class="btn btn-primary"><i class="ik ik-plus"></i> Thêm mới</a></h3>
        <div class="card-header-right">
            <ul class="list-unstyled card-option" style="float:right">
                <li><i class="ik minimize-card ik-search"></i></li>
            </ul>
        </div>
    </div>
    <div class="card-body todo-task" style="display: none;">
    <?php $form = ActiveForm::begin([
            'action' => ['index'],
            'method' => 'get',
        ]); ?>
        <div class="row">
            <div class="col-md-12">
                <?= $form->field($model, 'name') ?>

                <?= $form->field($model, 'code') ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <?php
                $listDatas = \common\models\CatArticles::TT_ARRAY();
                ?>
                <?php echo $form->field($model, 'status')->dropDownList(
                    $listDatas,
                    ['prompt'=>'Select...']);
                ?>
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

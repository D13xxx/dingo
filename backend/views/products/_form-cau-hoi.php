<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CatInsurrances */
/* @var $form yii\widgets\ActiveForm */
?>
<?php
echo $this->render('_tabs',[
    'model'=>$model,
]);
?>
<?php $form = ActiveForm::begin(); ?>

<?php echo $form->errorSummary($model); ?>

<div class="row">
    <div class="col-sm-9 ">
        <div class="card task-board">
            <div class="card-header">
                <h3>Nội dung chi tiết.</h3>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option" style="width: 90px;">
                        <li><i class="ik ik-chevron-left action-toggle ik-chevron-right"></i></li>
                        <li><i class="ik ik-rotate-cw reload-card" data-loading-effect="pulse"></i></li>
                        <li><i class="ik minimize-card ik-plus"></i></li>
                        <li><i class="ik ik-x close-card"></i></li>
                    </ul>
                </div>
            </div>
            <div class="card-body todo-task">

                <?= $form->field($modelCauHoi, 'question')->textInput(['maxlength' => true]) ?>

                <?= $form->field($modelCauHoi, 'answer')->textarea(['id' => 'answer']) ?>

            </div>
        </div>

    </div>
    <div class="col-sm-3 ">
        <div class="card">
            <div class="card-body">
                <?php echo Html::submitButton('Cập nhật', ['class' => 'btn btn-success btn-block']);?>
                <a href="javascript: history.go(-1)" class="btn btn-primary btn-block">Quay lại</a>
            </div>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>
<script src="/libs/ckeditor/ckeditor.js?v=4"></script>

<script>
    CKEDITOR.replace('answer', {
        height: '400px',
    });
</script>
<?php

use dosamigos\tinymce\TinyMce;
use kartik\widgets\FileInput;
use mludvik\tagsinput\TagsInputWidget;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\CatArticles;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\CatArticles */
/* @var $form yii\widgets\ActiveForm */
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
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
                <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>
                <?=
                $form->field($model, 'parent_id')
                    ->dropDownList($dataCat,['prompt'=>'- Chọn danh mục -'])
                ?>

            </div>
        </div>
    </div>
    <div class="col-sm-3 ">
        <div class="card">
            <div class="card-body">
                <?php
                if ($model->isNewRecord) {
                    echo Html::submitButton('Thêm mới', ['class' => 'btn btn-success btn-block']);
                } else {
                    echo Html::submitButton('Cập nhật', ['class' => 'btn btn-success btn-block']);
                } ?>
                <?= Html::a('Quay lại', ['index'], ['class' => 'btn btn-primary pull-right btn-block']) ?>
            </div>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>

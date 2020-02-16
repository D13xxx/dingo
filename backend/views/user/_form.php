<?php

use kartik\widgets\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
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
                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

            </div>
        </div>
    </div>
    <div class="col-sm-3 ">
        <div class="card">
            <div class="card-body">
                <?php
                    echo Html::submitButton('Đăng ký', ['class' => 'btn btn-success btn-block']);
                ?>
                <?= Html::a('Quay lại', ['index'], ['class' => 'btn btn-primary pull-right btn-block']) ?>
            </div>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>

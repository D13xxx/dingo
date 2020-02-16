<?php

use kartik\widgets\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Banner */
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
                <?php
                if ($model->isNewRecord){
                    echo $form->field($model, 'image')->widget(FileInput::classname(), [
                        'options' => ['accept' => 'image/*','id'=>'images'],
                    ]);
                }else{
                    if($model->image==''||$model->image==null){
                        echo '';
                    } else {
                        echo Html::img(Yii::$app->request->baseUrl.'/upload/banner/'.$model->image,[
                            'style'=>['width'=>'100%','max-height'=>'300px;','margin'=>'0px auto 10px;']
                        ]);
                    }
                    ?>
                    <div style="width:100%">
                        <?= $form->field($model, 'image')->widget(FileInput::className(),[
                            'options'=>['accept'=>['*']],
                            'pluginOptions'=>[
                                'allowedFileExtensions'=>['jpg','jpeg','bmp','png','gif'],
                                'showUpload'=>false,
                                'showPreview'=>false,
                                'showCaption' => false,
                                'showRemove' => false,
                                'browseClass' => 'btn btn-primary btn-block',
                                'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
                                'browseLabel' =>  'Chọn ảnh thẻ'
                            ],
                        ])->label(false)?>
                    </div>
                <?php }
                ?>

                <?= $form->field($model, 'slug')->textInput(['maxlength' => true,])->label('Link liên kết tới bài viết') ?>
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

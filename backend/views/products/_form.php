<?php

use mludvik\tagsinput\TagsInputWidget;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;
use \xvs32x\tinymce\Tinymce;
use dosamigos\ckeditor\CKEditor;
use kartik\widgets\FileInput;
use developit\jcrop\Jcrop;
use budyaga\cropper\Widget;
use \yii\helpers\ArrayHelper;
use common\models\Parter;
/* @var $this yii\web\View */
/* @var $model common\models\Articles */
/* @var $form yii\widgets\ActiveForm */

$deleteScript = <<< JS
document.getElementById("products-full_name").addEventListener("keyup", ChangeToSlug);
document.getElementById("products-description").addEventListener("keyup", ChangeToSlug);
function ChangeToSlug()
{
    var title, slug;

        //Lấy text từ thẻ input title
    title = document.getElementById("products-full_name").value;

    countLenghtTitle = document.getElementById("products-full_name").value;
    countLenghtDesc = document.getElementById("products-description").value;
    console.log(title);
    
        //Đổi chữ hoa thành chữ thường
    slug = title.toLowerCase();

        //Đổi ký tự có dấu thành không dấu
    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
    slug = slug.replace(/đ/gi, 'd');
        //Xóa các ký tự đặt biệt
    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
        //Đổi khoảng trắng thành ký tự gạch ngang
    slug = slug.replace(/ /gi, "-");
        //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
        //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
    slug = slug.replace(/\-\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-/gi, '-');
    slug = slug.replace(/\-\-/gi, '-');
        //Xóa các ký tự gạch ngang ở đầu và cuối
    slug = '@' + slug + '@';
    slug = slug.replace(/\@\-|\-\@|\@/gi, '');
        //In slug ra textbox có id “slug”
    document.getElementById('products-slug').value = slug;

    document.getElementById("lenghtTitle").innerHTML =  countLenghtTitle.length;
    document.getElementById("lenghtDesc").innerHTML =  countLenghtDesc.length;
}

JS;
$this->registerJs($deleteScript, \yii\web\View::POS_READY);
?>

<style>
    /*input[type="file"] {*/
    /*    cursor: pointer !important;*/
    /*}*/
    
    .tags-input {
        width: 100% !important;
        padding: 4px;
    }
    
    button.btn.btn-default.btn-secondary.kv-hidden.fileinput-cancel.fileinput-cancel-button {
        display: none !important;
    }
    
    img.thumbnail {
        width: 200px !important;
        height: 200px !important;
        margin: 0 auto !important;
        margin-bottom: 20px !important;
    }
    
    .cropper-buttons {
        text-align: center !important;
        margin-bottom: 20px !important;
    }
    
    .new-photo-area {
        margin: 0 auto 20px !important;
    }
    
    .new-photo-area {
        width: 200px !important;
        height: 200px !important;
    }
    
    .cropper-buttons button {
        width: 200px;
         !important;
        display: list-item !important;
        margin: 5px auto !important;
    }
    
    div#uploaded {
        position: relative !important;
        z-index: 1 !important;
    }
    
    input#upload {
        position: absolute !important;
        width: 300px !important;
        height: 200px !important;
        top: 0 !important;
        opacity: 0 !important;
        left: 0;
    }
    a.maxlength {
        border: 1px solid gold;
        padding: 5px 10px;
        margin-left: 10px;
    }
</style>
<div id="myModal" class="modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Cắt ảnh</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-10 text-center">
                        <div id="image" style="width:300px; margin-top:20px"></div>
                    </div>
                    <div class="col-md-2" style="padding-top:20px;">
                        <br />
                        <br />
                        <br />
                        <button class="btn btn-success crop_image">Cắt ảnh</button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?php
if (!$model->isNewRecord) {
    echo $this->render('_tabs', [
        'model' => $model,
    ]);
} ?>
<br>
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
                <label for="products-full_name">Tiêu đề bài viết </label><a href="" class="maxlength" ><span id="lenghtTitle">0</span><span>/70</span></a>
                <?= $form->field($model, 'full_name')->textInput(['maxlength' => 70])->label(false) ?>

                <?= $form->field($model, 'slug')->textInput(['maxlength' => true,])->label('Slug * Bạn có thể giữ nguyên theo quy định hoặc thay đổi tùy chỉnh.') ?>

                <label for="products-description">Mô tả bài viết </label><a href="" class="maxlength" ><span id="lenghtDesc">0</span><span>/160</span></a>
                <?= $form->field($model, 'description')->textarea(['maxlength' => 160])->label(false) ?>
                <div class="row">
                    <div class="col-md-6">
                        <?=
                        $form->field($model, 'cat_insurrances_id')
                            ->dropDownList(
                                ArrayHelper::map(\common\models\CatInsurrances::find()->asArray()->all(), 'id', 'name')
                            )
                        ?>
                    </div>
                    <div class="col-md-6">
                        <?=
                        $form->field($model, 'parter_id')
                            ->dropDownList(
                                ArrayHelper::map(\common\models\Parter::find()->asArray()->all(), 'id', 'name')
                            )
                        ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <?php
                        $listDatas = \common\models\Products::R_ARRAY();
                        ?>
                        <?php echo $form->field($model, 'rank')->dropDownList(
                            $listDatas,
                            ['prompt'=>'Lựa chọn...']);
                        ?>
                    </div>
                    <div class="col-md-6">
                        <?php
                        $listDatas = \common\models\Products::CK_ARRAY();
                        ?>
                        <?php echo $form->field($model, 'periodic')->dropDownList(
                        $listDatas,
                        ['prompt'=>'Lựa chọn...']);
                        ?>
                    </div>
                </div>

                <?= $form->field($model, 'content')->textarea(['id' =>'content']) ?>
            </div>
        </div>

        <div class="card task-board">
            <div class="card-header">
                <h3>SEO</h3>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option" style="width: 90px;">
                        <li><i class="ik ik-chevron-left action-toggle ik-chevron-right"></i></li>
                        <li><i class="ik ik-rotate-cw reload-card" data-loading-effect="pulse"></i></li>
                        <li><i class="ik minimize-card ik-plus"></i></li>
                        <li><i class="ik ik-x close-card"></i></li>
                    </ul>
                </div>
            </div>
            <div class="card-body todo-task" style="display: none;">
                <?= $form->field($model, 'title_seo')->textInput() ?>

                <?= $form->field($model, 'description_seo')->textInput() ?>

                <?= $form->field($model, 'keyword_seo')->textInput() ?>
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
        <div class="card">
            <div class="card-body">
                <div id="uploaded">
                    <?php
                    if (!empty($model->avatar)) { ?>
                        <?= Html::img(\Yii::$app->request->BaseUrl . '/upload/products/' . $model->avatar, ['class' => 'avatar avatarPro img-thumbnail', 'id' => 'avatarPro']) ?>
                    <?php } else { ?>
                        <img src="https://via.placeholder.com/200x200" id="avatarPro" class="avatar img-thumbnail avatarPro" alt="avatar">
                    <?php }
                    ?>
                    <input type="file" id="upload" />
                </div>
                <?= $form->field($model, 'avatar')->hiddenInput(['id' => 'dataUpload']) ?>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <?= $form->field($model, 'price')->textInput() ?>

                <?= $form->field($model, 'phi_thuong_lien')->textInput(['placeholder' => "Phí thường liên / Chu kỳ"]) ?>

                <?= $form->field($model, 'price_date')->textInput() ?>

                <?= $form->field($model, 'quyen_loi_bao_hiem')->textInput(['placeholder' => "Số tiền /Người /Năm"]) ?>

                <?= $form->field($model, 'age')->textInput() ?>

                <?= $form->field($model, 'syntax')->textInput() ?>

                <?= $form->field($model, 'status')->checkbox() ?>
            </div>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>
<?php
$script = <<<JS
   
JS;
$this->registerJs($script, yii\web\view::POS_READY);
?>

<script src="/libs/ckeditor/ckeditor.js?v=4"></script>

<script>
    CKEDITOR.replace('content', {
        height: '600px',
    });
</script>
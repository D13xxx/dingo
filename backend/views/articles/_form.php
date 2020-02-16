<?php
use mludvik\tagsinput\TagsInputWidget;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \xvs32x\tinymce\Tinymce;
use kartik\widgets\FileInput;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model common\models\Articles */
/* @var $form yii\widgets\ActiveForm */
$deleteScript = <<< JS
    
    document.getElementById("articles-title").addEventListener("keyup", ChangeToSlug);
    document.getElementById("articles-desc").addEventListener("keyup", ChangeToSlug);
    function ChangeToSlug()
    {
        var title, slug,lenght;
        //Lấy text từ thẻ input title
        title = document.getElementById("articles-title").value;

        countLenghtTitle = document.getElementById("articles-title").value;
        countLenghtDesc = document.getElementById("articles-desc").value;
        
        
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
        document.getElementById('articles-slug').value = slug;
        document.getElementById("lenghtTitle").innerHTML =  countLenghtTitle.length;
        document.getElementById("lenghtDesc").innerHTML =  countLenghtDesc.length;
        
    }

JS;
$this->registerJs($deleteScript, \yii\web\View::POS_READY);
?>
<style>
    .tags-input{
        width: 100% !important;
        padding: 4px;
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
    .new-photo-area{
        width: 200px !important;
        height : 200px !important;
    }
    div#uploaded {
        position: relative !important;
        z-index: 1 !important;
    }

    input#uploadArticles {
        position: absolute !important;
        width: 100% !important;
        height: 100% !important;
        top: 0 !important;
        opacity: 0!important;
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
                        <div id="imageArticles" style="width:300px; margin-top:20px"></div>
                    </div>
                    <div class="col-md-2" style="padding-top:20px;">
                        <br />
                        <br />
                        <br/>
                        <button class="btn btn-success crop_imageArticles">Cắt ảnh</button>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
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
                <label for="articles-title">Tiêu đề bài viết </label><a href="" class="maxlength" ><span id="lenghtTitle">0</span><span>/70</span></a>
                <?= $form->field($model, 'title')->textInput(['maxlength' => 70,])->label(false) ?>

                <?= $form->field($model, 'slug')->textInput(['maxlength' => true,])->label('Slug * Bạn có thể giữ nguyên theo quy định hoặc thay đổi tùy chỉnh.') ?>

                <label for="articles-desc">Mô tả bài viết </label><a href="" class="maxlength" ><span id="lenghtDesc">0</span><span>/160</span></a>
                <?= $form->field($model, 'desc')->textarea(['maxlength' => 160,])->label(false) ?>

                <?= $form->field($model, 'content')->textarea(['id' =>'content']) ?>
                <div class="row">
                    <div class="col-md-6">

                    </div>
                    <div class="col-md-6">

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">

                    </div>
                    <div class="col-md-6">

                    </div>
                </div>


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
                    <label for="">Ảnh đại diện</label>
                    <?php
                    if(!empty($model->avatar)){ ?>
                        <?= Html::img(\Yii::$app->request->BaseUrl.'/upload/articles/'.$model->avatar,['class'=>'avatar img-thumbnail','id'=>'avatarNews'])?>
                    <?php }else{ ?>
                        <img src="https://via.placeholder.com/300x200" id="avatarNews"  class="avatar img-thumbnail" alt="avatar">
                    <?php }
                    ?>
                    <input type="file" id="uploadArticles" />
                </div>

                <?= $form->field($model, 'avatar')->hiddenInput(['id'=>'dataUpload'])->label(false) ?>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <?=
                $form->field($model, 'cat_articles_id')
                    ->dropDownList(
                        ArrayHelper::map(\common\models\CatArticles::find()->asArray()->all(), 'id', 'name'), ['prompt'=>'Select...']);
                ?>

                <?= $form->field($model, 'tags')->widget(TagsInputWidget::className()) ?>

                <?= $form->field($model, 'is_hot_new')->checkbox() ?>
            </div>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>

<script src="/libs/ckeditor/ckeditor.js?v=4"></script>

<script>

 CKEDITOR.replace( 'content', {
  height: '600px',
} );
</script>

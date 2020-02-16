<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use \kartik\file\FileInput;
use dosamigos\tinymce\TinyMce;
use dosamigos\datepicker\DatePicker;
use trntv\filekit;
use budyaga\cropper\Widget;
/* @var $this yii\web\View */
/* @var $model common\models\InfoProfile */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
 
    button.btn.btn-default.btn-secondary.kv-hidden.fileinput-cancel.fileinput-cancel-button {
        display: none !important;
    }
    div#uploadedProFile{
        position: relative !important;
        z-index: 1 !important;
    }

    input#uploadProFile{
        position: absolute !important;
        width: 200px !important;
        height: 200px !important;
        top: 0 !important;
        opacity: 0!important;
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
                        <div id="imageProFile" style="width:300px; margin-top:20px"></div>
                    </div>
                    <div class="col-md-2" style="padding-top:20px;">
                        <br />
                        <br/>
                        <button class="btn btn-success crop_imageProFile">Cắt ảnh</button>
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
<div class="row">
    <div class="col-lg-4 col-md-5">
        <div class="card">
            <div class="card-body">
                <div class="text-center">

                    <div id="uploaded">
                        <?php
                        if(!empty($model->avatar)){ ?>
                            <img src="<?= \Yii::$app->request->BaseUrl.'/upload/info-profile/'.$model->avatar?>" class="rounded-circle" width="150">
                        <?php }else{ ?>
                            <img src="../theme1/img/user.jpg" class="rounded-circle" width="150">
                        <?php }
                        ?>
                        <input type="file" id="uploadProFile" />
                    </div>
                    <?= $form->field($model, 'avatar')->hiddenInput(['id'=>'dataUploadProFile']) ?>

                    <h4 class="card-title mt-10"><?= $model->full_name ? $model->full_name : 'Admin'?></h4>
                    <p class="card-subtitle">Web Developer</p>
                    <div class="row text-center justify-content-md-center">
                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="ik ik-user"></i> <font class="font-medium">254</font></a></div>
                        <div class="col-4"><a href="javascript:void(0)" class="link"><i class="ik ik-image"></i> <font class="font-medium">54</font></a></div>
                    </div>
                </div>
            </div>
            <hr class="mb-0">
            <div class="card-body">
                <small class="text-muted d-block">Email address </small>
                <h6><?= $user->email ?></h6>
                <small class="text-muted d-block pt-10">Phone</small>
                <h6><?= $model->cell_phone ? $model->cell_phone : '0987001396'?></h6>
                <small class="text-muted d-block pt-10">Address</small>
                <h6>71 Pilgrim Avenue Chevy Chase, MD 20815</h6>
                <div class="map-box">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d248849.886539092!2d77.49085452149588!3d12.953959988118836!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bae1670c9b44e6d%3A0xf8dfc3e8517e4fe0!2sBengaluru%2C+Karnataka!5e0!3m2!1sen!2sin!4v1542005497600" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen=""></iframe>
                </div>
                <small class="text-muted d-block pt-30">Social Profile</small>
                <br>
                <button class="btn btn-icon btn-facebook"><i class="fab fa-facebook-f"></i></button>
                <button class="btn btn-icon btn-twitter"><i class="fab fa-twitter"></i></button>
                <button class="btn btn-icon btn-instagram"><i class="fab fa-instagram"></i></button>
            </div>
        </div>
    </div>
    <div class="col-lg-8 col-md-7">
        <div class="card">
            <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link" id="pills-timeline-tab" data-toggle="pill" href="#current-month" role="tab" aria-controls="pills-timeline" aria-selected="false">Timeline</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active show" id="pills-profile-tab"  href="<?= \yii\helpers\Url::to(['info-profile/update','id'=>$model->id])?>" aria-controls="pills-profile" aria-selected="false">Tài khoản</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " id="pills-setting-tab" data-toggle="pill" href="<?= \yii\helpers\Url::to(['/user/doi-mat-khau','id'=>$user->id])?>" aria-controls="pills-setting" aria-selected="true">Đổi mật khẩu</a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade" id="current-month" role="tabpanel" aria-labelledby="pills-timeline-tab">
                    <div class="card-body">
                        <div class="profiletimeline mt-0">
                            <div class="sl-item">
                                <div class="sl-left"> <img src="../theme1/img/users/1.jpg" alt="user" class="rounded-circle"> </div>
                                <div class="sl-right">
                                    <div><a href="javascript:void(0)" class="link">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                        <p>assign a new task <a href="javascript:void(0)"> Design weblayout</a></p>
                                        <div class="row">
                                            <div class="col-lg-3 col-md-6 mb-20"><img src="../theme1/img/big/img2.jpg" class="img-fluid rounded"></div>
                                            <div class="col-lg-3 col-md-6 mb-20"><img src="../theme1/img/big/img3.jpg" class="img-fluid rounded"></div>
                                            <div class="col-lg-3 col-md-6 mb-20"><img src="../theme1/img/big/img4.jpg" class="img-fluid rounded"></div>
                                            <div class="col-lg-3 col-md-6 mb-20"><img src="../theme1/img/big/img5.jpg" class="img-fluid rounded"></div>
                                        </div>
                                        <div class="like-comm">
                                            <a href="javascript:void(0)" class="link mr-10">2 comment</a>
                                            <a href="javascript:void(0)" class="link mr-10"><i class="fa fa-heart text-danger"></i> 5 Love</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="sl-item">
                                <div class="sl-left">
                                    <?php
                                    if(!empty($model->avatar)){ ?>
                                        <?= Html::img(\Yii::$app->request->BaseUrl.'/upload/info-profile/'.$model->avatar,['class'=>'avatar avatarPro   img-thumbnail img-circle','id'=>'avatarPro'])?>
                                    <?php }else{ ?>
                                        <img src="../theme1/img/users/2.jpg" alt="user" class="rounded-circle">
                                    <?php }
                                    ?>
                                </div>
                                <div class="sl-right">
                                    <div> <a href="javascript:void(0)" class="link">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                        <div class="mt-20 row">
                                            <div class="col-md-3 col-xs-12"><img src="../theme1/img/big/img6.jpg" alt="user" class="img-fluid rounded"></div>
                                            <div class="col-md-9 col-xs-12">
                                                <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. </p> <a href="javascript:void(0)" class="btn btn-success"> Design weblayout</a>
                                            </div>
                                        </div>
                                        <div class="like-comm mt-20">
                                            <a href="javascript:void(0)" class="link mr-10">2 comment</a>
                                            <a href="javascript:void(0)" class="link mr-10"><i class="fa fa-heart text-danger"></i> 5 Love</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="sl-item">
                                <div class="sl-left">
                                    <?php
                                    if(!empty($model->avatar)){ ?>
                                        <img src="<?= \Yii::$app->request->BaseUrl.'/upload/info-profile/'.$model->avatar?>" alt="user" class="rounded-circle">
                                    <?php }else{ ?>
                                        <img src="../theme1/img/users/3.jpg" alt="user" class="rounded-circle">
                                    <?php }
                                    ?>

                                </div>
                                <div class="sl-right">
                                    <div>
                                        <a href="javascript:void(0)" class="link">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                        <p class="mt-10"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam. Sed nisi. Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper </p>
                                    </div>
                                    <div class="like-comm mt-20">
                                        <a href="javascript:void(0)" class="link mr-10">2 comment</a>
                                        <a href="javascript:void(0)" class="link mr-10"><i class="fa fa-heart text-danger"></i> 5 Love</a>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="sl-item">
                                <div class="sl-left"> <img src="../theme1/img/users/4.jpg" alt="user" class="rounded-circle"> </div>
                                <div class="sl-right">
                                    <div><a href="javascript:void(0)" class="link">John Doe</a> <span class="sl-date">5 minutes ago</span>
                                        <blockquote class="mt-10">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt
                                        </blockquote>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade active show" id="last-month" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="card-body">
                        <?php $form = ActiveForm::begin();?>

                        <?= $form->field($model, 'full_name')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'birth_day')->widget(\yii\jui\DatePicker::class, [
                            'language' => 'en',
                            'dateFormat' => 'M/d/Y',
                            'options' => ['class' => 'form-control']
                        ]) ?>

                        <?= $form->field($model, 'cell_phone')->textInput() ?>
                        <hr>
                        <?= Html::submitButton('Cập nhật', ['class' => 'btn btn-success pull-right']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>
<div class="info-profile-form">

    <div class="page-content-wrap">

        <div class="row">
            <div class="col-md-3 col-sm-4 col-xs-5">

                <div class="panel panel-default">
                    <div class="panel-body">
                        <?php
                        $id = \Yii::$app->user->identity->id;
                        $user = \common\models\InfoProfile::find()->where(['user_id'=>$id])->one();
                        ?>
                        <h3><span class="fa fa-user"></span> <?= $user->full_name ?></h3>
                        <p>Web Developer / Designer</p>

                        <div class="panel-body" align="center">

                            <br />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="panel panel-default form-horizontal">
                    <div class="panel-body">
                        <h3><span class="fa fa-info-circle"></span> Thông tin tài khoản</h3>
                        <p>Thông tin tài khoản</p>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-xs-5 control-label">Tài khoản</label>
                        <div class="col-md-9 col-xs-7">
                            <input type="text" value="<?= $model->user->username?>" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 col-xs-5 control-label">E-mail</label>
                        <div class="col-md-9 col-xs-7">
                            <input type="text" value="<?= $model->user->email?>" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12 col-xs-12">
                            <a href="<?= Url::to(['/user/doi-mat-khau','id'=>Yii::$app->user->identity->id] )?>" class="btn btn-danger btn-block btn-rounded">Thay đổi mật khẩu</a>
                        </div>
                    </div>

                    <div class="panel-body form-group-separated">
                        <div class="form-group">
                            <label class="col-md-4 col-xs-5 control-label">Địa chỉ Ip hiện tại</label>
                            <div class="col-md-8 col-xs-7 line-height-base"><?= Yii::$app->getRequest()->getUserIP() ?></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 col-xs-5 control-label">Thời gian đăng ký</label>
                            <div class="col-md-8 col-xs-7 line-height-base"><?= date("m/d/Y H:i:s",$model->user->created_at); ?></div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-4 col-xs-5 control-label">Nhóm quyền</label>
                            <div class="col-md-8 col-xs-7">
                                <?php
                                    foreach ($auths as $authAssignment){
                                        echo $authAssignment->item_name.',';
                                    }
                                ?>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

<?php

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<style>
    .error {
        display: none;
    }
    form#logOutForm {
        width: 100%;
    }

    button#btnLogOut {
        margin: .25rem 1.5rem;
    }
    .modal-dialog {
        z-index: 9999999;
    }
</style>
<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document" style="top:20%">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Đăng nhập</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form action="<?= Url::to('/site/login') ?>" id="formLogin" method="POST">
                        <div class="form-group">
                            <label for="">Số điện thoại:</label>
                            <input type="text" class="form-control" id="txtCellPhone" name="LoginForm[username]" placeholder="SDT: 0987 xxx xxx ">
                            <strong id="confirmCellPhone" class="error">Số điện thoại không được để trống</strong>
                        </div>
                        <div class="form-group">
                            <label for="">Mật khẩu:</label>
                            <input type="password" class="form-control" id="txtPassword" name="LoginForm[password]" id="" placeholder="Mật khẩu ....">
                            <strong id="confirmPassword" class="error">Mật khẩu không được để trống</strong>
                        </div>
                        <div class="form-group">
                            <a href="<?= Url::to('request-password-reset')?>" target="_blank" rel="noopener noreferrer">Quên mật khẩu ? </a>
                        </div>
                        <!-- <a href="javascript:validateFormLogin()" class="btn btn-primary">Đăng nhập</a> -->
                        <button type="submit" class="btn btn-primary">Đăng nhập</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#exampleModal').on('show.bs.modal', event => {
        var button = $(event.relatedTarget);
        var modal = $(this);
        // Use above variables to manipulate the DOM

    });
</script>

<nav id="menu" class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="<?= Url::to('/') ?>"><img src="/theme/images/logo.png?v=2"></a>
    <a class="navbar-toggler" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown active">
                <a class="nav-link dropdown-toggle" href="<?= Url::to(['/products/list-products-all']) ?>" id="navbarDropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    SẢN PHẨM
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php
                    $cats = \common\models\CatInsurrances::find()->all();
                    if (!empty($cats)) {
                        foreach ($cats as $cat) { ?>
                            <a class="dropdown-item" href="<?= Url::to(['/products/list-products','code'=>$cat->code]) ?>"><?= ucwords($cat->name) ?></a>
                    <?php }
                    }
                    ?>
                </div>

            </li>
            <li class="nav-item">
                <a class="nav-link  <?= (Yii::$app->controller->action->id == 'contract' ? 'active' : '') ?>" href="<?= Url::to(['/hop-dong.html']) ?>">HỢP ĐỒNG</a>
            </li>
            <li class="nav-item">
                <a class="nav-link  <?= (Yii::$app->controller->id == 'offset' ? 'active' : '') ?>" href="<?= Url::to(['/boi-thuong.html']) ?>">BỒI THƯỜNG</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= (Yii::$app->controller->action->id == 'about' ? 'active' : '') ?>" href="<?= Url::to('/ve-chung-toi.html') ?>">VỀ CHÚNG TÔI</a>
            </li>
            <li class="nav-item">
                <a class="nav-link  <?= (Yii::$app->controller->action->id == 'list-articles' ? 'active' : '') ?>" href="<?= Url::to('/goc-chuyen-gia.html') ?>">GÓC CHUYÊN GIA</a>
            </li>
        </ul>
        <div class="form-inline my-2 my-lg-0">
            <div class="phone_header">
                <a href="#">
                    <img class="ispc" src="/theme/images/icon-cell-phone.jpg">
                    <img class="ismb" src="/theme/images/icon-cell-phone-mb.jpg">
                    <span>18001091</span>
                </a>
            </div>
            <div class="login_header">
                <?php
                if (Yii::$app->user->isGuest) { ?>
                    <a href="#" data-toggle="modal" data-target="#modelId">
                        <img src="/theme/images/icon-user.jpg">
                        <span>Đăng nhập</span>
                    </a>      
                <?php } else { ?>
                    <div class="dropdown">
                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="outline: none;">
                            STK: <?php $user = \frontend\models\UserBaoHiem::find()->select('username')->where(['id'=>Yii::$app->user->getId()])->one();
                            echo $user->username;
                            ?>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="<?= Url::to(['/site/hoa-don','acc'=>$user->username]) ?>">Danh sách hóa đơn</a>
                            <a class="dropdown-item" href="<?= Url::to(['/site/thong-tin-tai-khoan','acc'=>$user->username]) ?>">Thông tin tài khoản</a>
                            <form action="<?= Url::to('/site/logout') ?>" id=logOutForm method="POST">
                                <button type="submit" class="btn" id="btnLogOut" style="text-align:left; padding:0">Đăng xuất</button>
                            </form>
                        </div>
                    </div>
                <?php }
                ?>
            </div>
        </div>
    </div>
</nav>
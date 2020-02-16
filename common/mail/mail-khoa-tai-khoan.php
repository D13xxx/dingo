<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

?>
<div class="verify-email">
    <div class="panel-body">
        <?php
        $user = \common\models\User::findOne($id);
        ?>
        <h3>Re: The Baohiemso.net team deverlopment</h3>
        <p>Hello <?= $user->username?>,</p>
        <p><b>Baohiemso.net</b> sẽ tiến hành tạm khóa tài khoản vì một số lí do.</p>
        <p>Kính mời bạn liên hệ trực tiếp với quản trị viên <b>Baohiemso.net</b> để xác thực khôi phục mật khẩu.</p>
        <br>
        <p>~~ Trân thành cảm ơn ~~</p>
    </div>
</div>

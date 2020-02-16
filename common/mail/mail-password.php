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
        <p>Chúng tôi đã nhận được yêu cầu khôi phục mật khẩu cho tài khoản của bạn.</p>
        <p>Việc khôi phục mật khẩu đã hoàn thành</p>
        <p class="text-muted"><strong>Tài khoản : <?= $user->username?><br> </strong></p>
        <p class="text-muted"><strong>Mật khẩu : 123456 </strong></p>
        <br>
        <p>~~ Trân thành cảm ơn ~~</p>
    </div>

</div>

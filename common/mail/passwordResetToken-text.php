<?php

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]);
?>
Xin chào: <?= $user->username ?>,

<p>Vui lòng truy cập link dưới đây để thay đổi mật khẩu:</p>

<?= $resetLink ?>

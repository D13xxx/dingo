<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
?>
<div class="info-profile-update">
    <?= $this->render('/user/_form_password', [
        'model' => $model,
        'infoId' => $infoId,
        'user' => $user,
    ]) ?>

</div>

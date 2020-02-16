<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Products */

$this->title = Yii::t('backend', 'Cập nhật thông tin sản phẩm', [
    'name' => $model->id,
]);
?>
<?= $this->render('_form', [
    'model' => $model,
]) ?>

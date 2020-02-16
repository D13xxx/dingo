<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Banner */

$this->title = Yii::t('backend', 'Thêm mới banner');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Banners'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('_form', [
    'model' => $model,
]) ?>

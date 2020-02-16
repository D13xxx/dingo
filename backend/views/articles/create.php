<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Articles */

$this->title = 'Thêm mới tin tức';
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="page-content-wrap">
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>

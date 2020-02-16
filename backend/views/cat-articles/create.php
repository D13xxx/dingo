<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CatArticles */

$this->title = 'Thêm mới nhóm bài viết';
$this->params['breadcrumbs'][] = ['label' => 'Cat Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('_form', [
    'model' => $model,
    'dataCat' => $dataCat,
]) ?>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CatArticles */

$this->title = 'Cập nhật';

?>
<?= $this->render('_form', [
    'model' => $model,
    'dataCat' => $dataCat,
]) ?>

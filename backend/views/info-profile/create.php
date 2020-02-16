<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\InfoProfile */

$this->title = 'Create Info Profile';
$this->params['breadcrumbs'][] = $this->title;
?>


<?= $this->render('_form', [
    'model' => $model,
]) ?>

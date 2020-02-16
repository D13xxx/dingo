<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\AboutUs */

$this->title = Yii::t('backend', 'Google map');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'About uses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="about-us-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

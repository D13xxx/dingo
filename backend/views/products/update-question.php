<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CatInsurrances */

$this->title = Yii::t('backend', 'Cập nhật danh sách câu hỏi');

?>

<?= $this->render('_form-cau-hoi', [
    'modelCauHoi' => $modelCauHoi,
    'model' => $model,
]) ?>

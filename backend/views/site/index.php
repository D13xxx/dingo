<?php
use vova07\console\ConsoleRunner;
/* @var $this yii\web\View */
$this->title = 'BaoHiemSo.net - Hệ thống bảo hiểm online';
?>
 <a href="<?= \yii\helpers\Url::to(Yii::$app->consoleRunner->run('user/index')) ?>" class="btn btn-primary"><i class="ik ik-plus"></i> Thêm mới</a>
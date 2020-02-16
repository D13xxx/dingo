<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<style>

</style>
<div class="site-error">
    <div class="col-md-12">

        <div class="error-container">
            <div class="error-code"><?= Html::encode($this->title) ?></div>
            <div class="error-subtext"><?= nl2br(Html::encode($message)) ?></div>
            <div class="error-actions">
                <div class="row">
                    <div class="col-md-6">
                        <?= Html::a('Quay lại trang chủ','/site/index',['class'=>'btn btn-info btn-block btn-lg'])?>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-primary btn-block btn-lg" onclick="history.back();">Quay lại trang trước</button>
                    </div>
                </div>
            </div>
            <div class="error-subtext">Xin lỗi quý khách vị lỗi không mong muốn. Xin trân thành cảm ơn!!</div>
        </div>
    </div>
</div>

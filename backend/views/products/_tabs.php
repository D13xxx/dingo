<ul class="nav nav-tabs">
    <li class="nav-item">
        <a href="<?= \yii\helpers\Url::to(['/products/update','id'=>$model->id])?>" class="nav-link <?=(Yii::$app->controller->action->id=='update'?'active':'')?>">Thông tin chung</a>
    </li>
    <li class="nav-item">
        <a href="<?= \yii\helpers\Url::to(['/products/list-question','proId'=>$model->id])?>" class="nav-link <?=(Yii::$app->controller->action->id=='list-question' || Yii::$app->controller->action->id=='create-question' || Yii::$app->controller->action->id=='update-question' ?'active':'')?>">Câu hỏi & Trả lời</a>
    </li>
</ul>

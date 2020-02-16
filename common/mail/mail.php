<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

?>
<div class="verify-email">
    <?php
        $model = \common\models\Articles::find()->all();
        foreach ($model as $data){
            echo  $data->title.'<br>';
            echo  $data->desc.'<br>';
        }
    ?>


    <p>Follow the link below to verify your email:</p>

</div>

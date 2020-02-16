<?php

use common\models\CatArticles;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\query\AboutUsQuery */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Google map');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">
            <?= Html::a('Thêm mới',['create'],['class'=>'btn btn-primary'])?>
            <br>
            <br>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'iframe',
                ],
            ]); ?>
        </div>
    </div>
</div>

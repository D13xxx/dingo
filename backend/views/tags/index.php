<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\query\TagsQuery */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tags';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card">
    <div class="card-body">
        <div class="card-header row">
            <div class="col col-sm-3">
                <div class="card-options d-inline-block">
                    <div class="dropdown d-inline-block">
                        <a class="nav-link dropdown-toggle" href="#" id="moreDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ik ik-more-horizontal"></i></a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="moreDropdown">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">More Action</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col col-sm-6">
                <div class="card-search with-adv-search dropdown">
                    <input type="text" class="form-control global_filter" id="global_filter" placeholder="Search.." required="">
                    <button type="submit" class="btn btn-icon"><i class="ik ik-search"></i></button>
                    <button type="button" id="adv_wrap_toggler" class="adv-btn ik ik-chevron-down dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></button>
                    <div class="adv-search-wrap dropdown-menu dropdown-menu-right" aria-labelledby="adv_wrap_toggler" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(448px, 30px, 0px);">
                        <div class="row">
                            <?= $this->render('_search', [
                                'model' => $searchModel,
                            ]) ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'summary' => '',
            'tableOptions' => [
                'id' => 'advanced_table',
                'class'=>'table table-hover mb-0'
            ],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'tag_name',
                [
                    'header'=>'Bài viết',
                    'attribute'=>'articles_id',
                    'format'=>'html',
                    'value'=>function($data){
                        return Html::a($data->articles->title,['articles/view','slug'=>$data->articles->slug]);
                    }
                ],
            ],
        ]); ?>
    </div>
</div>

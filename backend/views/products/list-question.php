<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\bootstrap\Modal;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel common\models\query\CatInsurrancesQuery */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend','Câu hỏi & phương án thuộc nhóm.');
$this->params['breadcrumbs'][] = $this->title;
?>
<?php
echo $this->render('_tabs',[
    'model'=>$model,
]);
?>
<div class="card">
    <div class="card-body">
        <div class="card-header row">
            <div class="col col-sm-3">
                <a href="<?= \yii\helpers\Url::to(['create-question','proId'=>$model->id]) ?>" class="btn btn-primary"><i class="ik ik-plus"></i> Thêm mới</a>
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
                'question',
                [
                    'attribute'=>'answer',
                    'format'=>'html'
                ],
                [
                    'header' => 'Chức năng',
                    'format' => 'raw',
                    'contentOptions' => ['style' => 'vertical-align: middle;font-size:17px; text-align:center'],
                    'value' => function ($data) {
                        $strButton = '
                                <div class="dropdown d-inline-block">
                                <a class="nav-link dropdown-toggle" href="#" id="moreDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ik ik-more-horizontal"></i></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="moreDropdown">
                                    <a class="dropdown-item" href="' . \yii\helpers\Url::to(['update-question', 'id' => $data->id]) . '">Cập nhật</a>
                                    <form action="' . \yii\helpers\Url::to(['delete-question', 'id' => $data->id]) . '" method="post">
                                        <button type="submit" class="btnDel btn-submit"><span class="glyphicon glyphicon-trash"></span> Xóa</button>
                                    </form>
                                </div>
                            </div>
                            ';
                        return $strButton;
                    },
                ],
            ],
        ]); ?>
    </div>
</div>
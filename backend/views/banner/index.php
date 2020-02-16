<?php

use common\models\Banner;
use common\models\query\ArticlesQuery;
use dosamigos\tinymce\TinyMce;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel common\models\query\ArticlesQuery */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Banner';
$this->params['breadcrumbs'][] = $this->title;
?>
<?= $this->render('_search', [
    'model' => $searchModel,
]) ?>
<div class="card">
    <div class="card-body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'summary' => '',
            'tableOptions' => [
                'class'=>'table table-hover mb-0'
            ],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'attribute' => 'image',
                    'format' => 'html',
                    'value' => function ($data) {
                        return Html::img(\Yii::$app->request->BaseUrl.'/upload/banner/'. $data['image'],
                            ['width' => '100px','max-height'=>'100px'],['class'=>'thum-nail']);
                    },
                ],
                [
                    'attribute' => 'slug',
                    'format' => 'html',
                    'value' => function ($data) {
                        return Html::a($data['slug'], ['articles/view','slug'=>$data->slug]);
                    },
                ],
                [
                    'attribute'=>'status',
                    'format'=>'html',
                    'value'=>function($data){
                        return '<span class="label label-'.Banner::TT_COLOR_ARRAY()[(int)$data->status].'">'.Banner::TT_ARRAY()[(int)$data->status].'</span>';
                    }
                ],

                [
                    'header' => 'Chức năng',
                    'format' => 'raw',
                    'contentOptions' => ['style' => 'vertical-align: middle;font-size:17px; text-align:center'],
                    'value' => function ($data) {
                        if($data->status == Banner::TT_ACTIVE){
                            $strButton = '
                            <div class="dropdown d-inline-block">
                                <a class="nav-link dropdown-toggle" href="#" id="moreDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ik ik-more-horizontal"></i></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="moreDropdown">
                                    <a class="dropdown-item" href="' . \yii\helpers\Url::to(['update', 'id' => $data->id]) . '">Cập nhật</a>
                                    <a class="dropdown-item" href="' . \yii\helpers\Url::to(['disable', 'id' => $data->id]) . '" onclick="return confirm(\'Bạn có chắc chắn muốn ẩn bài viết này hay không?\');">Ẩn</a>
                                    <form action="' . \yii\helpers\Url::to(['delete', 'id' => $data->id]) . '" method="post">
                                        <button type="submit" class="btnDel btn-submit"><span class="glyphicon glyphicon-trash"></span> Xóa</button>
                                    </form>
                                </div>
                            </div>
                            ';
                        }else{
                            $strButton = '
                            <div class="dropdown d-inline-block">
                                <a class="nav-link dropdown-toggle" href="#" id="moreDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ik ik-more-horizontal"></i></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="moreDropdown">
                                    <a class="dropdown-item" href="' . \yii\helpers\Url::to(['update', 'id' => $data->id]) . '">Cập nhật</a>
                                    <a class="dropdown-item" href="' . \yii\helpers\Url::to(['active', 'id' => $data->id]) . '" onclick="return confirm(\'Bạn có chắc chắn muốn kích hoạt bài viết này hay không?\');">Kích hoạt</a>
                                    <form action="' . \yii\helpers\Url::to(['delete', 'id' => $data->id]) . '" method="post">
                                        <button type="submit" class="btnDel btn-submit"><span class="glyphicon glyphicon-trash"></span> Xóa</button>
                                    </form>
                                </div>
                            </div>
                            ';
                        }
                       
                        return $strButton;
                    },
                ],
            ],
        ]); ?>
    </div>
</div>

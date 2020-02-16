<?php

use common\models\Articles;
use common\models\query\ArticlesQuery;
use dosamigos\tinymce\TinyMce;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\grid\GridView;
use common\models\Products;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel common\models\query\ArticlesQuery */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Danh sách sản phẩm bảo hiểm';
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
                    'attribute' => 'avatar',
                    'format' => 'html',
                    'contentOptions' => ['style' => 'padding:5px;vertical-align: middle;'],
                    'value' => function ($data) {
                        return Html::img(\Yii::$app->request->BaseUrl . '/upload/products/' . $data['avatar'],
                            ['width' => '100px'], ['class' => 'thum-nail']);
                    },
                ],
                [
                    'attribute' => 'full_name',
                    'format' => 'html',
                    'contentOptions' => ['style' => 'padding:5px;vertical-align: middle;'],
                    'value' => function ($data) {
                        return Html::a(ucwords($data->full_name), ['view', 'slug' => $data->slug]);
                    },
                ],
                [
                    'attribute' => 'cat_insurrances_id',
                    'format' => 'html',
                    'contentOptions' => ['style' => 'padding:5px;vertical-align: middle;'],
                    'value' => function ($data) {
                        return $data->catProducts->name;
                    }
                ],
                [
                    'attribute' => 'status',
                    'format' => 'html',
                    'contentOptions' => ['style' => 'padding:5px;vertical-align: middle;text-align:center'],
                    'value' => function ($data) {
                        return '<span class="label label-' . Products::TT_COLOR_ARRAY()[(int)$data->status] . '">' . Products::TT_ARRAY()[(int)$data->status] . '</span>';

                    }
                ],
                [
                    'attribute' => 'rank',
                    'format' => 'html',
                    'contentOptions' => ['style' => 'padding:5px;vertical-align: middle; text-align:center;'],
                    'value' => function ($data) {
                        return '<span class="label label-' . Products::R_COLOR_ARRAY()[(int)$data->rank] . '">' . Products::R_ARRAY()[(int)$data->rank] . '</span>';
                    }
                ],
                [
                    'attribute' => 'created_at',
                    'format' => 'html',
                    'contentOptions' => ['style' => 'padding:5px;vertical-align: middle;'],
                    'value' => function ($data) {
                        return '<abbr class="timeago" title="' . date('Y-m-d H:i:s', $data->created_at) . '"></abbr>';
                    }
                ],

                [
                    'header' => 'Chức năng',
                    'format' => 'raw',
                    'contentOptions' => ['style' => 'vertical-align: middle;font-size:17px; text-align:center'],
                    'value' => function ($data) {
                        if($data->status == Products::TT_ACTIVE){
                            $strButton = '
                            <div class="dropdown d-inline-block">
                                <a class="nav-link dropdown-toggle" href="#" id="moreDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ik ik-more-horizontal"></i></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="moreDropdown">
                                    <a class="dropdown-item" href="' . \yii\helpers\Url::to(['view', 'slug' => $data->slug]) . '">Xem chi tiết</a>
                                    <a class="dropdown-item" href="' . \yii\helpers\Url::to(['update', 'id' => $data->id]) . '">Cập nhật</a>
                                    <a class="dropdown-item" href="' . \yii\helpers\Url::to(['active', 'id' => $data->id]) . '" onclick="return confirm(\'Bạn có chắc chắn muốn kích hoạt sản phẩm này hay không?\');">Kích hoạt</a>
                                    <a class="dropdown-item" href="' . \yii\helpers\Url::to(['disable', 'id' => $data->id]) . '" onclick="return confirm(\'Bạn có chắc chắn muốn ẩn sản phẩm này hay không?\');">Ẩn</a>
                                </div>
                            </div>
                        ';
                        }else{
                            $strButton = '
                            <div class="dropdown d-inline-block">
                                <a class="nav-link dropdown-toggle" href="#" id="moreDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ik ik-more-horizontal"></i></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="moreDropdown">
                                    <a class="dropdown-item" href="' . \yii\helpers\Url::to(['view', 'slug' => $data->slug]) . '">Xem chi tiết</a>
                                    <a class="dropdown-item" href="' . \yii\helpers\Url::to(['update', 'id' => $data->id]) . '">Cập nhật</a>
                                    <a class="dropdown-item" href="' . \yii\helpers\Url::to(['active', 'id' => $data->id]) . '" onclick="return confirm(\'Bạn có chắc chắn muốn kích hoạt sản phẩm này hay không?\');">Kích hoạt</a>
                                    <a class="dropdown-item" href="' . \yii\helpers\Url::to(['disable', 'id' => $data->id]) . '" onclick="return confirm(\'Bạn có chắc chắn muốn ẩn sản phẩm này hay không?\');">Ẩn</a>
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

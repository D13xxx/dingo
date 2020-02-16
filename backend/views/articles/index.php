<?php

use dosamigos\tinymce\TinyMce;
use yii\helpers\Html;
use \common\models\Articles;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel common\models\query\ArticlesQuery */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tin tức';
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
                    'value' => function ($data) {
                        return Html::img(\Yii::$app->request->BaseUrl.'/upload/articles/'.$data['avatar'],
                            ['width' => '100px'],['class'=>'thum-nail']);
                    },
                ],
                [
                    'attribute' => 'title',
                    'format' => 'html',
                    'value' => function ($data) {
                        return Html::a(ucwords($data->title), ['view','slug'=>$data->slug]);
                    },
                ],
                [
                    'attribute'=>'cat_articles_id',
                    'format'=>'html',
                    'contentOptions'=> ['style' => 'vertical-align: middle'],
                    'value'=>function($data){
                        return $data->cat_articles_id ?  $data->catArtiles->name : '';
                    }
                ],
                [
                    'attribute'=>'author',
                    'format'=>'html',
                    'contentOptions'=> ['style' => 'vertical-align: middle'],
                    'value'=>function($data){
                        $fullName = \common\models\InfoProfile::find()->where(['user_id'=>$data->author])->one();
                        return $fullName->full_name;
                    }
                ],
                [
                    'attribute'=>'status',
                    'format'=>'html',
                    'contentOptions'=> ['style' => 'vertical-align: middle'],
                    'value'=>function($data){
                        return '<span class="badge badge-pill'.Articles::TT_COLOR_ARRAY()[(int)$data->status].'">'.Articles::TT_ARRAY()[(int)$data->status].'</span>';
                    }
                ],

                [
                    'attribute'=>'created_at',
                    'format'=>'html',
                    'contentOptions'=> ['style' => 'vertical-align: middle'],
                    'value'=>function($data){
                        return date('d/m/Y H:i',$data->created_at);
                    }
                ],

                [
                    'header' => 'Chức năng',
                    'format' => 'raw',
                    'contentOptions' => ['style' => 'vertical-align: middle;font-size:17px; text-align:center'],
                    'value' => function ($data) {
                        if($data->status == Articles::TT_MOI){
                            $strButton = '
                            <div class="dropdown d-inline-block">
                            <a class="nav-link dropdown-toggle" href="#" id="moreDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ik ik-more-horizontal"></i></a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="moreDropdown">
                                <a class="dropdown-item" href="' . \yii\helpers\Url::to(['view', 'slug' => $data->slug]) . '">Xem chi tiết</a>
                                <a class="dropdown-item" href="' . \yii\helpers\Url::to(['update', 'id' => $data->id]) . '">Cập nhật</a>
                                <a class="dropdown-item" href="' . \yii\helpers\Url::to(['active', 'id' => $data->id]) . '" onclick="return confirm(\'Bạn có chắc chắn muốn kích hoạt bài viết này hay không?\');">Kích hoạt</a>
                                <a class="dropdown-item" href="' . \yii\helpers\Url::to(['disable', 'id' => $data->id]) . '" onclick="return confirm(\'Bạn có chắc chắn muốn ẩn bài viết này hay không?\');">Ẩn</a>
                                <a class="dropdown-item" href="' .\yii\helpers\Url::to(['del','id'=>$data->id]). '" onclick="return confirm(\'Bạn có chắc chắn muốn xóa bài viết này hay không?\');">Xóa tạm thời</a>
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
                                <a class="dropdown-item" href="' . \yii\helpers\Url::to(['view', 'slug' => $data->slug]) . '">Xem chi tiết</a>
                                <a class="dropdown-item" href="' . \yii\helpers\Url::to(['update', 'id' => $data->id]) . '">Cập nhật</a>
                                <a class="dropdown-item" href="' . \yii\helpers\Url::to(['active', 'id' => $data->id]) . '" onclick="return confirm(\'Bạn có chắc chắn muốn kích hoạt bài viết này hay không?\');">Kích hoạt</a>
                                <a class="dropdown-item" href="' . \yii\helpers\Url::to(['disable', 'id' => $data->id]) . '" onclick="return confirm(\'Bạn có chắc chắn muốn ẩn bài viết này hay không?\');">Ẩn</a>
                                <a class="dropdown-item" href="' .\yii\helpers\Url::to(['del','id'=>$data->id]). '" onclick="return confirm(\'Bạn có chắc chắn muốn xóa bài viết này hay không?\');">Xóa tạm thời</a>
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

<?php
use yii\widgets\LinkPager;
use yii\helpers\Html;
use yii\helpers\Url;
use  yii\data\Pagination;
$this->title = $cat->name;
/* @var $this yii\web\View */
/* @var $model common\models\Articles */

\yii\web\YiiAsset::register($this);
?>

<div class="card">
    <div class="card-header"><h3>Nhóm bài viết</h3></div>
    <div class="card-body">
        <ul class="nav nav-pills">
            <?php
            if(!empty($listCats)){
                foreach ($listCats as $listCat){ ?>
                    <li class="nav-item">
                        <a class="nav-link <?= $listCat->name == $cat->name ? 'active' : '' ?>" href="<?= Url::to(['articles/list-articles-cat','catId'=>$listCat->id]) ?>"><?= ucwords($listCat->name)  ?></a>
                    </li>
                <?php }
            }
            ?>
        </ul>
    </div>
</div>
<div class="row layout-wrap" id="layout-wrap">
    <?php
    if (!empty($model)){
        foreach ($model as $article){?>
            <div class="col-xl-3 col-lg-4 col-12 col-sm-6 mb-4 list-item list-item-grid">
                <div class="card d-flex flex-row mb-3">
                    <a class="d-flex card-img" href="<?= Url::to(['view','slug'=>$article->slug])?>" >
                        <?php
                        if(!empty($article->avatar)){
                            echo Html::img(Yii::$app->request->baseUrl.'/upload/articles/'.$article->avatar,['alt'=>'some', 'class'=>'list-thumbnail responsive border-0']);
                        } else {
                            echo Html::img(Yii::$app->request->baseUrl.'/upload/articles/default.png',['alt'=>'some', 'class'=>'list-thumbnail responsive border-0']);
                        }
                        ?>
                        <!--                        <img src="../theme1/img/portfolio-1.jpg" alt="Donec sit amet est at sem iaculis aliquam." class="">-->
                        <span class="badge badge-pill badge-primary position-absolute badge-top-left"><?= $cat->name ?></span>
                    </a>
                    <div class="d-flex flex-grow-1 min-width-zero card-content">
                        <div class="card-body align-self-center d-flex flex-column flex-md-row justify-content-between min-width-zero align-items-md-center">
                            <a class="list-item-heading mb-1 truncate w-40 w-xs-100" href="<?= Url::to(['view','slug'=>$article->slug])?>" data-toggle="modal" data-target="#editLayoutItem">
                                <?= $article->title?>
                            </a>
                            <p class="mb-1 text-muted text-small category w-15 w-xs-100">Art</p>
                            <p class="mb-1 text-muted text-small date w-15 w-xs-100"><?= date('d.m.Y',$article->created_at)?></p>
                            <div class="w-15 w-xs-100">
                                <span class="badge badge-pill badge-secondary">On Hold</span>
                            </div>
                        </div>
                        <div class="custom-control custom-checkbox pl-1 align-self-center">
                            <label class="custom-control custom-checkbox mb-0">
                                <input type="checkbox" class="custom-control-input">
                                <span class="custom-control-label"></span>
                            </label>
                        </div>

                    </div>
                </div>
            </div>
        <?php }
    }
    ?>
</div>
<?=
LinkPager::widget([
    'pagination' => $pages,
]);
?>

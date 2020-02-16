<?php
use yii\helpers\Url;

$this->title = ($articles->title_seo != "") ? $articles->title_seo .' | Bảo Hiểm Số' : $articles->title .' | Bảo Hiểm Số';
\Yii::$app->view->registerMetaTag([
    'name' => 'title',
    'content' => ($articles->title_seo != "") ? $articles->title_seo .' | Bảo Hiểm Số' : $articles->title .' | Bảo Hiểm Số',
]);
\Yii::$app->view->registerMetaTag([
    'name' => 'description',
    'content' => ($articles->description_seo != "") ? $articles->description_seo : $articles->desc,
]);

\Yii::$app->view->registerMetaTag([
    'name' => 'keywords',
    'content' => $articles->keyword_seo,
]);

\Yii::$app->view->registerMetaTag([
    'name' => 'url',
    'content' => Url::to(['articles/view', 'slug' => $articles->slug]),
]);

\Yii::$app->view->registerMetaTag([
    'name' => 'og:title',
    'content' => ($articles->title_seo != "") ? $articles->title_seo : $articles->title,
]);
\Yii::$app->view->registerMetaTag([
    'property' => 'og:description',
    'content' => ($articles->description_seo != "") ? $articles->description_seo : $articles->desc,
]);
\Yii::$app->view->registerMetaTag([
    'property' => 'og:image',
    'content' => 'http://baohiemso.net/media' . (($articles->avatar != "") ? '/articles/' . ($articles->avatar) : '/articles/' . $model->avatar),
]);

?>

<style>
    b.author {
        display: block;
        font-size: 14px;
        color: brown;
        padding: 10px 10px 5px 0px;
        text-transform: uppercase;
    }
    span.time-created {
        font-weight: 400;
        padding-left: 10px;
    }
    .content ul li {
        list-style: disc;
    }
    table, th, td {
        border: 1px solid #ab8b8b;
        border-collapse: collapse;
        text-align: center;
        padding: 10px;
    }
</style>
<div class="banner_main bk-detail-product">
    <div class="breadcrumb">
        <p>
            <a href="/">Trang chủ</a>
            <i class="fal fa-chevron-right"></i>
            <a href="<?= Url::to(['/articles/list-articles-cat','code'=>$articles->catArtiles->code]) ?>"><?= $articles->catArtiles->name ?></a>
            <!-- <i class="fal fa-chevron-right"></i>
            <a href="#"><?= $articles->title?></a> -->
        </p>
    </div>
</div>
<!-- end header -->
<div id="wrapper" class="check">
    <!-- main-content -->
    <div class="news">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="row">
                        <div class="ileft col-lg-8">
                            <h1><?= $articles->title?></h1>
                            <b class="author"><?= $articles->catArtiles->name ?> <span class="time-created"><?= date('H:i:s d-m-Y',$articles->created_at)?></span></b>
                            <div class="button-facebook">
                                <iframe src="https://www.facebook.com/plugins/like.php?href=http://baohiemso.net/<?= $articles->slug?>.html&&layout=standard&action=like&size=small&show_faces=true&share=true&height=80&appId=254423978768118" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                            </div>
                            <p class="desc"><?= $articles->desc ? $articles->desc : ''?></p>
                            <div class="content">
                                <p>
                                    <?= $articles->content?>
                                </p>
                            </div>
                            <div class="keyword">
                                <p>Từ khóa:
                                    <?php
                                    if (!empty($tagsNames)){
                                        foreach ($tagsNames as $tagsNames=> $values){?>
                                            <a href="<?= Url::to(['list-articles-tags','tag'=>$values])?>"><?= $values ?></a>
                                        <?php }
                                    }
                                    ?>
                                </p>
                            </div>
                        </div>
                        <div class="iright col-lg-4">
                            <h3>Góc chuyên gia</h3>
                            <ul>
                                <?php
                                if (!empty($catArticles)){
                                    foreach ($catArticles as $catArticle){?>
                                        <li><a href="<?= Url::to(['/articles/list-articles-cat','code'=>$catArticle->code])?>"><?= $catArticle->name ?></a></li>
                                    <?php }
                                }
                                ?>
                            </ul>

                            <div style="clear: both"></div>
                            <?php
                            if (!empty($listArticlesLimits)){
                                foreach ($listArticlesLimits as $listArticlesLimit){?>
                                    <div class="item row">
                                        <div class="image col-md-6">
                                            <a href="<?= Url::to(['/articles/view','slug'=>$listArticlesLimit->slug])?>">
                                                <?php
                                                if(!empty($listArticlesLimit->avatar)){?>
                                                    <img src="<?= Yii::getAlias('@fakelink/articles/'.$listArticlesLimit->avatar)?>"  >
                                                <?php }else{?>
                                                    <img src="https://via.placeholder.com/300x200" alt="avatar">
                                                <?php }
                                                ?>
                                            </a>
                                        </div>
                                        <div class="info col-md-6">
                                            <a href="<?= Url::to(['/articles/view','slug'=>$listArticlesLimit->slug])?>" class="title"><h3><?= $listArticlesLimit->title ?></h3></a>
                                        </div>
                                    </div>
                                <?php }
                            }
                            ?>
                            <br>
                            <h3>Fanpage facebook</h3>
                            <div class="facebook-fanpage">
                                <div class="fb-page" style="width: 100%;" data-href="https://www.facebook.com/baohiemso.net/" data-tabs="timeline" data-width="" data-height="400" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="true"><blockquote cite="https://www.facebook.com/baohiemso.net/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/baohiemso.net/">Bảo Hiểm Số Việt Nam</a></blockquote></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- slider news -->
    <div class="slider_news">
        <div class="container sale-title">
            <div class="row">
                <ul style="margin: 0;padding-left: 15px;">
                    <li>
                        <h3>Góc chuyên gia</h3>
                    </li>
                    <li><img class="gach" src="/theme/images/gach.jpg"></li>
                    <li>
                        <div class="brum">
                            <ul>
                                <li><img src="/theme/images/icon-tin-tuc.png" alt=""><a href="<?= Url::to(['/articles/list-articles-cat','code'=>'tin-tuc'])?>">Câu chuyện</a>
                                </li>
                                <li><img src="/theme/images/icon-uu-dai-khuyen-mai.png" alt=""><a href="<?= Url::to(['/articles/list-articles-cat','code'=>'khuyen-mai'])?>"> Ưu đãi -
                                        Khuyến mại</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>

        </div>
        <div class="wrap-slide">
            <div class="slider_p row  owl-carousel owl-theme">
                <?php
                if (!empty($listArticles)){
                    foreach ($listArticles as $listArticle){?>
                        <div class="item">
                            <div class="img">
                                <a class="img_zom" href="<?= Url::to(['/articles/view','slug'=>$listArticle->slug])?>">
                                    <?php
                                    if(!empty($listArticle->avatar)){?>
                                        <img src="<?= Yii::getAlias('@fakelink/articles/'.$listArticle->avatar)?>"  >
                                    <?php }else{?>
                                        <img src="https://via.placeholder.com/300x200" alt="avatar">
                                    <?php }
                                    ?>
                                </a>
                            </div>
                            <div class="content">
                                <a href="<?= Url::to(['/articles/view','slug'=>$listArticle->slug])?>">
                                    <h3><?= $listArticle->title?></h3>
                                </a>
                                <a href="<?= Url::to(['/articles/view','slug'=>$listArticle->slug])?>" class="more">Xem chi tiết</a>
                            </div>
                        </div>
                    <?php }
                }
                ?>
            </div>

            <div class="nextBtnNews"><img src="/theme/images/next-icon.png"></div>
            <div class="previousNews"><img src="/theme/images/prev-icon.png"></div>
        </div>

    </div>

    <!-- partner -->
    <?= $this->render('/layouts/parter') ?>
    <!-- end  parter-->

</div>
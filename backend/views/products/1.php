<?php
// echo 2; die;
/**
 * Created by PhpStorm.
 * User: Hoàng
 * Date: 12/08/2016
 * Time: 2:15 CH
 * @var $this yii\web\View
 * @var $data array
 * @var $ads array
 */
use app\services\GameService;

$url_img = Yii::$app->params['media'];
$game_name = $data['detail']['name_' . Yii::$app->language];
$game_description = $data['detail']['description_' . Yii::$app->language];

$Seo_Default = \Yii::$app->params;
if ($data['detail']['seo_title'] == "") {
    $title = str_replace('[title_game]', $game_name, $Seo_Default['detail_tile_text']);
} else {
    $title = $data['detail']['seo_title'];
}
$this->title = $title;
(new \app\services\GameService())->registerMetaTag($this, $seo_tag, $data['detail']);
\app\assets\GameIndexAsset::register($this);
$advService = new \app\services\AdvService();
\app\services\GameService::getGameSize($data['detail'], 735, 600);


$session_name_game = Yii::$app->session;
$session_name_game->set('namegame', $game_name);

$connection = \Yii::$app->db;
$model = $connection->createCommand("SELECT `iframe_video`  FROM `game` where id=".$data['detail']['id']);
$iframe_video = $model->queryColumn();  
$video =  $iframe_video[0];
$video = "";
?>

<style>
    #game-left {
        position: absolute;
        margin-left: -140px;
        margin-top: -10px;
        background: #003d78;
        width: 100px;
    }
    .game-detail .iframe {
        width: <?= $data['detail']['width'] ?>px !important;
        height: <?= $data['detail']['height'] ?>px !important;
    }
    .game-detail .iframe * {
        max-height: 100%;
    }
    #game-left .game-container .game-list .game-item {
        width: 98px !important;
        height: 98px !important;
    }
    #game-left .game-container .game-list .game-item .game-name {
        font-size: 13px;
    }
    .game-related .game-item {
        width: 119px !important;
        height: 119px !important;
        width: 118px\0/ !important;
        height: 118px\0/ !important;
    }
    .game-area{
        max-width:777px\0/;
        margin-left:100px\0/;
    }
    .game-related .game-container{
        width:475px\0/;
    }
    .right{
        width:auto\0/;
    }

    *+html #game-left {

        margin-left:-880px !important;
        margin-top:0px !important;
    }
    *+html .game-area{
        max-width:777px;
        margin-left:100px;
    }
    *+html .game-related .game-container{
        width:475px;
    }
    *+html .right{
        width:auto;
    }
    *+html #game-left .game-container .game-list .game-item {
        width: 70px !important;
        height: 70px !important;
    }
    *+html .game-related .game-item {
        width: 100px !important;
        height: 100px !important;

    }

    .game-video{
        display: block;
        margin: 20px 0px;
        border-radius: 10px;
        background: #003d78;
        padding: 10px 20px;
        border: 1px solid #0077e9;
    }
    .top-detail{
        width: 100%;
        height:auto;
        display:flex;
    }
    
    .top-detail .img{
        width: 100%;
        height:auto;
        width:20%;
        float:left;
    }
    .top-detail .img img{
        width: 80%;
        height:auto;
        padding: 22px;  
    }   
    .top-detail .game-name{
        width: 60%;
        float:left;
        text-align:center;
    }
    .top-detail .img-avatar{
        width: 20%;
        float:right;
    }
    .top-detail .img-avatar img{
        width: 35%;
        float:right;
    }
    .mid-detail{
        width:100%;
        display:flex;
        margin-top: 10px;
    }
    
    .mid-detail .quang-cao{
        width:15%;
        float:left;
        height:500px;
        background:#000;
    }
    .mid-detail .video-demo{
        width:70%;
        float:left;
        background:#000;
    }


    .game-name h3{
            color: #ffff;
    font-weight: 600;
    margin-top: 10px;
    font-size: 25px;
    }
    ul.nav-social li a i {
        font-size: 30px;
        color: darkslategray;
        margin-top: 10px;
    }
    .footer-detail {
        width: 100%;
        display: flex;
    }

    .footer-left {
        width: 15%;
        height: auto;
        float: left;
    }

    .footer-right {
        width: 85%;
        float: right;
    }

    .img-avatar {
        width: 100%;
    }

    .img-avatar img {
        width: 80%;
    }

    .footer-right h2 {
        color: #fff;
        font-weight: 600;
    }
    .video-demo iframe {
        width: 100%;
        height: 100%;
    }

    a.through {
        background: #eaae16;
        color: #fff;
        line-height: 25px;
        padding: 4px 15px;
        border-radius: 15px;
        margin-right: 10px;
        text-decoration: none;
    }
    a.through:hover {
        background: #115ba6;
    }
    a.through i {
        font-size: 25px;
        color: #fff;
        margin-right: 8px;
        margin-top: 0;
        float: left;
    }
    .fb-like{margin-left: 10px;}
    #rate{margin-top: 5px !important;}

</style>

<div class="game-index">
    <div class="container not100">
        <div class="col-md-1 col-xs-12 col-sm-1 text-right left">

        </div>
        <div class="game-area col-xs-12 col-md-8 col-sm-8">
            <div class="text-center top">
                <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- abcya3_search_top_728x90 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-4937496200727397"
     data-ad-slot="7955559298"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
            </div>
            <div class="game-detail">
                <div id="game-left">
                    <div style="text-align: center">
                        <a href="<?= \app\services\BaseService::getReferrer() ?>" >
                            <img src="/css/images/back.png" title="Back" alt="Back"/>
                        </a>
                    </div>
                    <div class="game-container">
                        <div class="game-list">
                            <?php
                            for ($i = 0; $i < 6; $i++) {
                                if (isset($data['related'][$i])) {
                                    $game = $data['related'][$i];
                                    ?>
                                    <a href="<?= \app\services\GameService::makeUrl($game) ?>"
                                       title="<?= $game['name_' . Yii::$app->language] ?>" class="game-item">
                                        <div class="wrap-game">
                                            <img
                                                src="<?= $url_img . $game['avatar'] ?>"
                                                alt="<?= $game['name_' . Yii::$app->language] ?>"/>
                                            <h3 class="game-name"><?= $game['name_' . Yii::$app->language] ?></h3>
                                        </div>
                                        <div class="text-game">
                                            <p><?= $game['name_' . Yii::$app->language] ?></p>										
                                        </div>
                                    </a>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div class="game-nav text-left pull-left">
                    <ul class="no-list-style pull-left">

                        <li>
                            <a href="http://<?= \Yii::$app->params['site_domain'] ?>" title="<?= $Seo_Default['title_a_detail'] ?>">
                                    <!--<span><?= $menus[0]['label_en'] ?></span>-->
                                <span><?= $Seo_Default['text_a_detail'] ?></span>
                                <i class="fa fa-home" aria-hidden="true"></i>
                                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                            <a href="/<?= $data['detail']['category_alias'] ?>" itemprop="url">							
                                <span itemprop="title" ><?= $data['detail']['category_name_' . Yii::$app->language] ?></span>
                                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <h1><?= $game_name ?></h1>

                        </li>
                    </ul>
                    <div id="rate" class="box-rating-<?= $data['detail']['id'] ?> pull-right">
                        <span> Rate:</span>

                        <input type="hidden" name="rating" id="rating" value="1" />
                        <input type="hidden" name="game" id="game" value="<?= $data['detail']['alias'] ?>" />
                        <ul onMouseOut="resetRating(<?= $data['detail']['id'] ?>);">
                            <?php
                            if ($data['detail']['rate_count'] == 0) {
                                $rating = 0;
                            } else {
                                $rating = $data['detail']['rate_total'] / $data['detail']['rate_count'];
                            }
                            for ($i = 1; $i <= 5; $i++) {
                                $select = "";
                                $selected_ = "";
                                if ($i <= $rating) {
                                    $select = "selected";
                                    $selected_ = "selected-" . $data['detail']['id'];
                                }
                                ?>
                                <li class='<?= $select . ' ' . $selected_ ?>' onmouseover="highlightStar(this,<?= $data['detail']['id'] ?>);" onmouseout="removeHighlight(<?= $data['detail']['id'] ?>);" onClick="addRating(this,<?= $data['detail']['id'] ?>);"><i class="fa fa-star" aria-hidden="true"></i></li>
                            <?php } ?>
                        </ul>
                        
                        <div class="fb-like" data-layout="button_count" data-action="like" data-size="small"
                             data-show-faces="true" data-share="false"></div>
                    </div>
                    <div id="rate-google">

                        <div itemscope itemtype="http://schema.org/Recipe">
                            <img itemprop="image" src="<?= $url_img . $data['detail']['avatar'] ?>" alt="<?= $game_name ?>"/>
                            <p itemprop="name"><?= $game_name ?></p>
                            <p itemprop="description"> <?= $game_description ?></p>
                            <p itemprop="author"><?= $_SERVER['SERVER_NAME'] ?></p>                          
                            <div itemprop="aggregateRating"
                                 itemscope itemtype="http://schema.org/AggregateRating">                                
                                Rating: <span itemprop="ratingValue"><?php
                                    if ($rating == 0) {
                                        echo rand(1, 5);
                                    } else {
                                        echo $rating;
                                    }
                                    ?></span>
                                out of <span itemprop="bestRating">5</span>
                                based on <span itemprop="ratingCount"><?php
                                    if ($data['detail']['rate_count'] == 0) {
                                        echo rand(1, 5);
                                    } else {
                                        echo $data['detail']['rate_count'];
                                    }
                                    ?></span> user ratings
									</div> 
                        </div>
                    </div>
                    <?php if($video != ""){?>
                        <a class="pull-right through" href="#game-video"><i class="fa fa-play-circle-o" aria-hidden="true"></i>WALKTHROUGH</a>
                    <?php } ?>
                </div>
                <div class="cleart"></div>
                <div class="iframe text-center">
                    <?php
                    switch ($data['detail']['type']) {
                        case 1 :
                            echo '<object type="application/x-shockwave-flash" data="' . $url_img . $data['detail']['file'] . '" width="100%" height="100%"><param name="wmode" value="opaque"><param name="menu" value="false" /></object>';
                            break;
                        case 3 :
                            echo '<iframe src="' . $data['detail']['file_url'] . '" frameborder="0" width="100%" height="100%"></iframe>';
                            break;
                        default :
                            if (!strpos($data['detail']['iframe'], '</iframe>')) {
                                echo $data['detail']['iframe'] . '</iframe>';
                            } else {
                                echo $data['detail']['iframe'];
                            }
                            break;
                    }
                    ?>
                </div>
				</br>
				<div class="col-sm-12" style="text-align:center">
					
				</div>
                <div class="game-description">
                    <div class="share" style="margin-bottom: 10px">
                        <a class="pull-right" target="_blank"
                           href="https://plus.google.com/share?url=<?= \app\services\GameService::makeUrl($data['detail'], true); ?>"
                           data-size="large"><i class="fa fa-google-plus text-danger" aria-hidden="true"></i>
                        </a>
                        <a class="twitter-share-button pull-right" target="_blank"
                           href="https://twitter.com/intent/tweet?text=<?= \app\services\GameService::makeUrl($data['detail'], true); ?>"
                           data-size="large"><i class="fa fa-twitter text-primary" aria-hidden="true"></i>
                        </a>
                        <a class="facebook pull-right" href="http://www.facebook.com/sharer.php?u=<?= \app\services\GameService::makeUrl($data['detail'], true); ?>&title=<?= $game_name ?>" target="_blank" data-tip="Share on Facebook" rel="nofollow" title="">
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                        </a>
                        <span class="pull-right">Share: </span>
                    </div>
                  
                    <p><b><?= $game_name ?> GamePlay:</b></p>
                    <?= $game_description ?>
                </div>
                <div class="tags">
                    <?php
                    $GameService = new GameService();
                    $Array_Tags = explode(',', $data['detail']['seo_tag']);
                    ?>
                    <ul>
                        <li><i class="fa fa-tags" aria-hidden="true"></i> Tags:</li>

                        <?php
                        foreach ($Array_Tags as $Tags) {
                            if ($Tags != "") {
                                ?>
                                <li>
                                    <a href="/tag/<?= strtolower($GameService->convert(trim($Tags))) ?>.html"><h2><?= $Tags ?></h2></a>
                                </li>
                                <?php
                            }
                        }
                        ?>

                    </ul>
                </div>
                <div class="cleart"></div>
            </div>
            
             <div class="game-related" style="margin: auto">
                <div style="width: 300px; float: left">
                   <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- abcya3_detail_300x250 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:250px"
     data-ad-client="ca-pub-4937496200727397"
     data-ad-slot="3342592525"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
                </div>
                <div class="game-container" style="width: calc(100% - 300px); float: left">
                    <div class="game-list">
                        <?php
                        for ($i = 6; $i < 14; $i++) {
                            if (isset($data['related'][$i])) {
                                $game = $data['related'][$i]
                                ?>
                                <a href="<?= \app\services\GameService::makeUrl($game) ?>"
                                   title="<?= $game['name_' . Yii::$app->language] ?>" class="game-item">
                                    <div class="wrap-game">
                                        <img
                                            src="<?= $url_img . $game['avatar'] ?>"
                                            alt="<?= $game['name_' . Yii::$app->language] ?>"/>
                                        <h3 class="game-name"><?= $game['name_' . Yii::$app->language] ?></h3>
                                    </div>
                                    <div class="text-game">
                                        <p><?= $game['name_' . Yii::$app->language] ?></p>                                      
                                    </div>
                                </a>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
                <div style="clear: both"></div>
            </div>
            <div class="back-link">
                <ul class="no-list-style">
                    <li><h3>Related <?= $game_name ?>:</h3></li>
                    <?php foreach ($data['backLink'] as $bl) { ?>
                        <li>
                            <a href="<?= $bl['link'] ?>" title="<?= $bl['label_' . Yii::$app->language] ?>"
                               target="_blank" style="color: <?= $bl['color'] ?>">
                                   <?= $bl['label_' . Yii::$app->language] ?>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
           

            <div class="text-center middle">
               
               <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- abcya3_detail_970_250 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:970px;height:250px"
     data-ad-client="ca-pub-4937496200727397"
     data-ad-slot="6311961672"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
                
            </div>

            <div class="social" style="width: 970px">
                <?= \app\components\comments\widget\CommentWidget::widget(['gameId'=>$data['detail']['id'],'comment'=>$data['comment']])?>
                <div class="fb-comments"
                     data-numposts="5" width="100%"></div>
            </div>
        </div>
        <div class="col-md-3 col-xs-12 col-sm-3 text-right right">
            <div class="fix">
                    			
                <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- abcya3_detail_300x250 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:300px;height:250px"
     data-ad-client="ca-pub-4937496200727397"
     data-ad-slot="3342592525"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>
            </div>
        </div>
        <div class="col-md-12">
             <?php if($video != ""){?>
            <div class="game-video" id="game-video">
                <div class="top-detail">
                    <div class="img">
                        <img src="/css/images/logo.png?v=<?=time()?>" />
                    </div>
                    <div class="game-name">
                        <h3 class="text-center"><i class="fa fa-play-circle-o" aria-hidden="true"></i> <?php echo $data['detail']['name_en'] ?></h3>  <a href="https://www.youtube.com/channel/UCPQhtW3XNjs7bwcI3ARcqUg?sub_confirmation=1"><img src="http://www.4j.com/images/youtube.png"/></a>
                    </div>
                    <div class="img-avatar">
                        <img class="text-center" src="<?php echo $url_img . $data['detail']['avatar'] ?>" alt="<?php echo $data['detail']['name_en'] ?>">
                    </div>
                </div>
                <!-- <hr class="game-video-hr"> -->
                <div class="mid-detail">
                    <div class="quang-cao">
                    </div>
                    <div class="video-demo">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/<?= $video?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div class="quang-cao">

                    </div>
                </div>
            </div>
            <?php } ?>   
        </div>
    </div>
</div>
<style>
    #rate{
        margin-top:0px  !important;
    }
</style>


<script type="text/javascript">

    $(document).ready(function() {

        $('.close-ads').click(function() {

            $(".banner-advertisement").toggleClass("not-active");

        });

    });

</script>


<div class="banner-advertisement animated bounceInUp delay-3s">

    <div class="content">

        <p class="close-ads"><img src="/images/close.png"></p>
        <div style="width: 728px; height: 90px; background: #fff;">
            <!-- <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script> -->
<!-- abcya3_detail_popup_728x90 -->
<!-- <ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-4937496200727397"
     data-ad-slot="9147429451"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script> -->

<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- abcya3 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-4188352020436773"
     data-ad-slot="3000505614"></ins>
<script>
     (adsbygoogle = window.adsbygoogle || []).push({});
</script>

        </div>
    </div>

</div>								
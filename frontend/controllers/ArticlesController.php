<?php

namespace frontend\controllers;

use common\models\Banner;
use common\models\CatArticles;
use common\models\Parter;
use common\models\Products;
use Yii;
use common\models\Articles;
use common\models\query\ArticlesQuery;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use common\models\Tags;
/**
 * ArticlesController implements the CRUD actions for Articles model.
 */
class ArticlesController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Articles models.
     * @return mixed
     */
    public function actionListArticles()
    {
        $hotArticle = Articles::find()->where(['is_del'=>Articles::IS_ACTIVE])
            ->andWhere(['is_hot_new'=>1])
            ->andWhere(['status'=>Articles::TT_DUOCDUYET])
            ->orderBy(['id'=>SORT_DESC])->one();
        $listHotArticles = Articles::find()
            ->where(['is_del'=>Articles::IS_ACTIVE])
            ->andWhere(['is_hot_new'=>1])
            ->andWhere(['status'=>Articles::TT_DUOCDUYET])
            ->orderBy(['id'=>SORT_DESC])->limit(4)->all();
        $query = Articles::find()
            ->where(['is_del'=>Articles::IS_ACTIVE])
            ->andWhere(['status'=>Articles::TT_DUOCDUYET])
            ->orderBy(['id'=>SORT_DESC]);
        $countQuery = clone $query;
        $pages = new Pagination(['pageSize' => 10,'totalCount' => $countQuery->count()]);
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        $catArticles = CatArticles::find()->all();
        return $this->render('list-articles', [
            'models' => $models,
            'pages' => $pages,
            'catArticles' => $catArticles,
            'hotArticle'=>$hotArticle,
            'listHotArticles'=>$listHotArticles,
        ]);
    }
    public function actionListArticlesCat($code)
    {
        $catArticlesName = CatArticles::find()->where(['code'=>$code])->one();
        $query = Articles::find()->andWhere(['cat_articles_id'=>$catArticlesName->id])->andWhere(['status'=>Articles::TT_DUOCDUYET])->andWhere(['is_del'=>Articles::IS_ACTIVE])->orderBy(['id'=>SORT_DESC]);
        $countQuery = clone $query;
        $pages = new Pagination(['pageSize' => 10,'totalCount' => $countQuery->count()]);
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        $catArticles = CatArticles::find()->all();
        return $this->render('list-articles-cat', [
            'models' => $models,
            'pages' => $pages,
            'catArticles' => $catArticles,
            'catArticlesName' => $catArticlesName,
        ]);
    }

    /**
     * Displays a single Articles model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($slug)
    {
        $catArticles = CatArticles::find()->all();
        $articles = Articles::find()->where(['slug'=>$slug])->andWhere(['status'=>Articles::TT_DUOCDUYET])->one();
        $articles->views  = $articles->views +1;
        $articles->save();
        
        $listArticlesLimits = Articles::find()->where(['cat_articles_id'=>$articles->cat_articles_id])->orderBy(['id'=>SORT_DESC])->limit(5)->all();
        $tagsNames = explode(',',$articles->tags);
        $listArticles = Articles::find()->all();
        

        return $this->render('view', [
            'articles' => $articles,
            'catArticles' => $catArticles,
            'listArticlesLimits' => $listArticlesLimits,
            'tagsNames' => $tagsNames,
            'listArticles' => $listArticles,
        ]);
    }

    public function actionSearch($key){
        $query = Articles::find()->where(['like', 'title', $key])->andWhere(['status'=>Articles::TT_DUOCDUYET])
            ->orWhere(['like', 'slug', $key])
            ->orWhere(['like', 'slug', $key]);
        $countQuery = clone $query;
        $pages = new Pagination(['pageSize' => 10,'totalCount' => $countQuery->count()]);
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();
        $catArticles = CatArticles::find()->all();
        return $this->render('search',[
            'models'=>$models,
            'key'=>$key,
            'pages'=>$pages,
            'catArticles'=>$catArticles,
        ]);
    }

    public function actionListArticlesTags($tag){
        $query = Tags::find()->andWhere(['tag_name'=>$tag]);
        $countQuery = clone $query;
        $pages = new Pagination(['pageSize' => 10,'totalCount' => $countQuery->count()]);
        $models = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        $catArticles = CatArticles::find()->all();
        return $this->render('list-articles-tags', [
            'models' => $models,
            'pages' => $pages,
            'catArticles' => $catArticles,
            'tag'=>$tag
        ]);
    }
    protected function findModel($id)
    {
        if (($model = Articles::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

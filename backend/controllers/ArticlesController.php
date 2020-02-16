<?php

namespace backend\controllers;

use common\models\Articles;
use common\models\CatArticles;
use common\models\Products;
use Yii;
use common\models\query\ArticlesQuery;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
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
    public function actionIndex()
    {
        $searchModel = new ArticlesQuery();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->orderBy(['id' => SORT_DESC]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
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
        $model = Articles::find()->where(['slug' => $slug])->one();
        $tagsNames = explode(',', $model->tags);
        $modelBaiVietLienQuans = Articles::find()->where(['cat_articles_id' => 1])->andWhere(['NOT IN', 'slug', [$slug]])->limit(10)->all();
        $modelCats = CatArticles::find()->all();
        return $this->render('view', [
            'model' => $model,
            'modelBaiVietLienQuans' => $modelBaiVietLienQuans,
            'tagsNames' => $tagsNames,
            'modelCats' => $modelCats,
        ]);
    }
    public function actionDisable($id){
        $model = Articles::findOne($id);
        $model->status = Articles::TT_MOI;
        $model->save();
        $searchModel = new ArticlesQuery();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where(['is_del' => Articles::IS_ACTIVE])->orderBy(['id' => SORT_DESC]);
        Yii::$app->session->setFlash('success', Yii::t('app', 'Ẩn bài viết thành công.'));
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionActive($id){
        $model = Articles::findOne($id);
        $model->status = Articles::TT_DUOCDUYET;
        $model->save();
        $searchModel = new ArticlesQuery();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where(['is_del' => Articles::IS_ACTIVE])->orderBy(['id' => SORT_DESC]);
        Yii::$app->session->setFlash('success', Yii::t('app', 'Kích hoạt bài viết thành công.'));
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionDel($id){
        $model = Articles::findOne($id);
        $connection = Yii::$app->getDb();
        $users = $connection->createCommand('DELETE FROM tags WHERE articles_id ='.$id)->execute();
        $model->delete();
        Yii::$app->session->setFlash('success', Yii::t('app', 'Xóa bài viết thành công.'));
        return $this->redirect('index');
    }

    /**
     * Creates a new Articles model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Articles();
        if ($model->load(Yii::$app->request->post())) {
            $model->is_del = Articles::IS_ACTIVE;
            $model->author = Yii::$app->user->identity->id;
            $model->status = Articles::TT_MOI;
            $model->created_at = strtotime("now");
            $model->views = 1;
            // convert base64 to image
            $data = $model->avatar;

            $linkFolder = '/web/upload/articles/';
            $this->actionCropSaveImage($model, $data, $linkFolder);

            if ($model->save()) {

                $tagsNames = explode(',', $model->tags);
                $this->actionSaveArrTags($tagsNames, $model);

                $this->actionIsActive($model);
                Yii::$app->session->setFlash('success', Yii::t('app', 'Thêm mới thành công.'));
                return $this->redirect(['view', 'slug' => $model->slug]);
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Articles model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $str = $model->avatar;
        if ($model->load(Yii::$app->request->post())) {
            $model->updated_at = strtotime("now");
            if ($model->avatar == $str) {
                $model->avatar = $str;
            } else {
                $data = $model->avatar;
                $linkFolder = '/web/upload/articles/';
                $this->actionCropSaveImage($model, $data, $linkFolder);
            }

            if ($model->save()) {
                $this->actionRemoveOldTags($model);

                $tagsNames = explode(',', $model->tags);
                $this->actionSaveArrTags($tagsNames, $model);

                $this->actionIsActive($model);

                Yii::$app->session->setFlash('success', Yii::t('app', 'Cập nhật thành công.'));
                return $this->redirect(['view', 'slug' => $model->slug]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Articles model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionIsDelete($id)
    {
        $model = Articles::findOne($id);
        $model->is_del = Articles::IS_DEL;
        if ($model->save()) {
            Yii::$app->session->setFlash('success', Yii::t('app', 'Xóa thành công.'));
            return $this->redirect(['index']);
        }
    }

    public function actionListArticlesCat($catId)
    {
        $listCats = CatArticles::find()->all();
        $query = Articles::find()->where(['cat_articles_id' => $catId]);
        $countQuery = clone $query;
        $pages = new Pagination(['pageSize' => 8, 'totalCount' => $countQuery->count()]);
        $model = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        $cat = CatArticles::findOne($catId);
        $modelCats = CatArticles::find()->andWhere(['NOT IN', 'id', [$catId]])->all();
        $articlesViews = Articles::find()->where(['cat_articles_id' => $catId])->orderBy(['views' => SORT_DESC])->limit(10)->all();
        return $this->render('list-articles-cat', [
            'model' => $model,
            'pages' => $pages,
            'cat' => $cat,
            'listCats' => $listCats,
            'modelCats' => $modelCats,
            'articlesViews' => $articlesViews,
        ]);
    }
   
    /**
     * Finds the Articles model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Articles the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Articles::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * @param Articles $model
     * @param $data
     * @param $linkFolder
     */
    protected function actionCropSaveImage(Articles $model, $data, $linkFolder)
    {
        if (!empty($model->avatar)) {
            $fileName = explode('+', $data);
            $strFileName = $fileName[0];

            $position = strpos($strFileName, '.', 0);
            $strFileName = substr($strFileName, 0, $position) . strtotime("now") . '.png';

            $strEx = explode('base64,', $data);
            $imgFile = base64_decode($strEx[1]);

            file_put_contents(Yii::$app->basePath . $linkFolder . $strFileName, $imgFile);
            $model->avatar = $strFileName;
        }
    }

    /**
     * @param array $tagsNames
     * @param Articles $model
     */
    protected function actionSaveArrTags(array $tagsNames, Articles $model)
    {
        if (!empty($tagsNames)) {
            foreach ($tagsNames as $tagsNames => $values) {
                $modelTags = new Tags();
                $modelTags->tag_name = $values;
                $modelTags->articles_id = $model->id;
                $modelTags->save();
            }
        }
    }

    /**
     * @param Articles $model
     */
    protected function actionIsActive(Articles $model)
    {
        $modelCat = CatArticles::find()->where(['id' => $model->cat_articles_id])->one();
        if (!$model->status == CatArticles::IS_ACTIVE) {
            $modelCat->status = CatArticles::IS_ACTIVE;
            $modelCat->save();
        }
    }

    /**
     * @param Articles $model
     * @throws \yii\db\Exception
     */
    protected function actionRemoveOldTags(Articles $model)
    {
        Yii::$app->db->createCommand("DELETE FROM tags WHERE articles_id =" . $model->id)->query();
    }
}

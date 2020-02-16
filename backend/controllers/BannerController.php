<?php

namespace backend\controllers;

use common\models\Articles;
use common\models\Parter;
use Yii;
use common\models\Banner;
use common\models\query\BannerQuery;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * BannerController implements the CRUD actions for Banner model.
 */
class BannerController extends Controller
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
     * Lists all Banner models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BannerQuery();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Banner model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Banner model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Banner();
        if ($model->load(Yii::$app->request->post())) {
            $model->status = Banner::TT_ACTIVE;
            $model->created_at = strtotime("now");
            $avatar=UploadedFile::getInstance($model,'image');
            if(!is_null($avatar)){
                $tam=$avatar->name;
                Yii::$app->params['uploadAnh']=Yii::$app->basePath.'/web/upload/banner/';
                $path=Yii::$app->params['uploadAnh'].$tam;
                $model->image=$tam;
                $avatar->saveAs($path);
            }

            if ($model->save()){
                Yii::$app->session->setFlash('success', Yii::t('app','Thêm mới thành công.'));
                return $this->redirect('index');
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Banner model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $oldAvatar =$model->image;
        if ($model->load(Yii::$app->request->post())) {
            $model->updated_at = strtotime("now");
            $avatar=UploadedFile::getInstance($model,'image');
            if(!is_null($avatar)){
                $tam=$avatar->name;
                Yii::$app->params['uploadAnh']=Yii::$app->basePath.'/web/upload/banner/';
                $path=Yii::$app->params['uploadAnh'].$tam;
                $model->image=$tam;
                $avatar->saveAs($path);
            }else{
                $model->image = $oldAvatar;
            }
            if ($model->save()){
                Yii::$app->session->setFlash('success',Yii::t('backend','Cập nhật thành công'));
                return $this->redirect('index');
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDisable($id)
    {
        $model = $this->findModel($id);

        $model->status = Banner::TT_DISABLE;
        if ($model->save()){
            Yii::$app->session->setFlash('success',Yii::t('backend','Vô hiệu hóa thành công'));
            return $this->redirect('index');
        }
    }
    public function actionActive($id)
    {
        $model = $this->findModel($id);

        $model->status = Banner::TT_ACTIVE;
        if ($model->save()){
            Yii::$app->session->setFlash('success',Yii::t('backend','Kích hoạt sử dụng banner thành công'));
            return $this->redirect('index');
        }
    }

    /**
     * Deletes an existing Banner model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Banner model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Banner the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Banner::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('backend', 'The requested page does not exist.'));
    }
}

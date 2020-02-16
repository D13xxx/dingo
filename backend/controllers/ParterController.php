<?php

namespace backend\controllers;

use Yii;
use common\models\Parter;
use common\models\query\ParterQuery;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ParterController implements the CRUD actions for Parter model.
 */
class ParterController extends Controller
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
     * Lists all Parter models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ParterQuery();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->orderBy(['id' => SORT_DESC]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Parter model.
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
     * Creates a new Parter model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Parter();

        if ($model->load(Yii::$app->request->post())) {
            $model->created_at = strtotime("now");
            $model->status = Parter::TT_MOI;

            $data = $model->avatar;
            $this->actionCropSaveImages($model, $data);

            if ($model->save()) {
                Yii::$app->session->setFlash('success', Yii::t('app', 'Thêm mới thành công.'));
                return $this->redirect('index');
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Parter model.
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
                $this->actionCropSaveImages($model, $data);
            }
            if ($model->save()) {
                Yii::$app->session->setFlash('success', Yii::t('backend', 'Cập nhật thành công'));
                return $this->redirect('index');
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Parter model.
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
     * Finds the Parter model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Parter the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Parter::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('backend', 'The requested page does not exist.'));
    }

    /**
     * @param Parter $model
     * @param $data
     */
    protected function actionCropSaveImages(Parter $model, $data)
    {
        if (!empty($model->avatar)) {
            $fileName = explode('+', $data);
            $strFileName = $fileName[0];

            $position = strpos($strFileName, '.', 0);
            $strFileName = substr($strFileName, 0, $position) . strtotime("now") . '.png';

            $strEx = explode('base64,', $data);
            $imgFile = base64_decode($strEx[1]);

            file_put_contents(Yii::$app->basePath . '/web/upload/parter/' . $strFileName, $imgFile);
            $model->avatar = $strFileName;
        }
    }
}

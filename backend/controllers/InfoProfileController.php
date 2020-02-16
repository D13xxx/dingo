<?php

namespace backend\controllers;

use common\models\AuthAssignment;
use common\models\User;
use Yii;
use common\models\InfoProfile;
use common\models\query\InfoProfileQuery;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * InfoProfileController implements the CRUD actions for InfoProfile model.
 */
class InfoProfileController extends Controller
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
     * Lists all InfoProfile models.
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $auths = AuthAssignment::find()->where(['user_id'=>$id])->all();
        $model = $this->findModel($id);
        $user = User::find()->where(['id'=>$model->user_id])->one();

        $str = $model->avatar;
        if ($model->load(Yii::$app->request->post())) {
            $model->birth_day = strtotime($model->birth_day);
            if ($model->avatar == $str){
                $model->avatar = $str;
            }else{
                $data = $model->avatar;
                $this->actionCropSaveImages($model, $data);
            }

            if ($model->save()){
                Yii::$app->session->setFlash('success','Cập nhật thông tin thành công');
                return $this->redirect(['update', 'id' => $id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
            'auths' => $auths,
            'user' => $user,
        ]);
    }

    protected function findModel($id)
    {
        if (($model = InfoProfile::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * @param InfoProfile $model
     * @param $data
     */
    protected function actionCropSaveImages(InfoProfile $model, $data)
    {
        if (!empty($model->avatar)) {
            $fileName = explode('+', $data);
            $strFileNam = "$fileName[0]+";
            $img = explode($strFileNam, $data);
            $strEx = explode('base64,', $img[1]);
            $imgFile = base64_decode($strEx[1]);
            file_put_contents(Yii::$app->basePath . '/web/upload/info-profile/' . $fileName[0], $imgFile);
            $model->avatar = $fileName[0];
        }
    }
}

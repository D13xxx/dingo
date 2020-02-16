<?php

namespace backend\controllers;

use backend\models\ChangePassword;
use backend\models\ChangePasswordForm;
use backend\models\SignupForm;
use common\models\AuthAssignment;
use common\models\Banner;
use common\models\CatArticles;
use common\models\InfoProfile;
use common\models\LogSystem;
use Yii;
use common\models\User;
use common\models\query\UserQuery;
use yii\rbac\Permission;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserQuery();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,

        ]);
    }

    function actionCreate()
    {
        $model = new SignupForm();
        $AuthAssignment = new AuthAssignment();
        $connection  = Yii::$app->getDb();
        $data = $connection->createCommand("
        SELECT * FROM `auth_item` WHERE name NOT LIKE '%/%'
        ");
        $results = $data->queryAll();

//        $arrayName = array();
//        foreach ($result as $item){
//            $arrayName[] = $item["name"];
//        }
//        echo '<pre>';
//        print_r($arrayName);
//        die();
        if ($model->load(Yii::$app->request->post())) {
//            $checkBoxs = Yii::$app->request->post('checkBox');
//            echo '<pre>';
//            print_r(Yii::$app->request->post());
//            die();
            $user = new User();
            $user->username = $model->username;
            $user->email = $model->email;
            $user->status = User::STATUS_ACTIVE;
            $user->setPassword($model->password);
            $user->generateAuthKey();
            $user->generateEmailVerificationToken();
            if ($user->save()){
                // tạo acc inforProfile của tài khoản
                $modelInfoProFile = new InfoProfile();
                $modelInfoProFile->user_id = $user->id;
                $modelInfoProFile->full_name = $user->username;

                $modelLog = new LogSystem();
                $modelLog->user_id = $user->id;
                $modelLog->created_at = strtotime('now');
                $modelLog->status = LogSystem::TT_TAOTAIKHOAN;
                $modelLog->save();
                $modelInfoProFile->save();
                Yii::$app->session->setFlash('success', Yii::t('app','Thêm mới thành công.'));
                return $this->redirect('index');
            }

        }
        return $this->render('create', [
            'model' => $model,
            'results' => $results,
            'AuthAssignment' => $AuthAssignment,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */

    public function actionDoiMatKhau($id)
    {
        $user = User::findOne($id);
        $infoId = InfoProfile::find()->where(['user_id'=>$id])->one();

        $model = new ChangePasswordForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                $user = User::findOne($id);
                $user->setPassword($model->newPassword);
                $user->generateAuthKey();
                if ($user->save()){
                    Yii::$app->session->setFlash('success', Yii::t('app','Thay đổi mât khẩu thành công.'));
                    return $this->redirect(['/user/doi-mat-khau','id'=>$id]);
                }
            }
        }
        return $this->render('change-password', [
            'model' => $model,
            'infoId' => $infoId,
            'user' => $user,
        ]);
    }

    public function actionResetPassword($id)
    {
        $user = User::findOne($id);
        $user->setPassword('123456');
        $user->generateAuthKey();
        if ($user->save()){
            // reset xong sẽ gửi mật khẩu qua email cho ng dùng
            $send = Yii::$app->mailer->compose(['html' => '@common/mail/mail-password'],['id' => $id])
                ->setFrom('auto@hellomedia.vn')
                ->setTo($user->email)
                ->setSubject('Thư xác nhận thay đổi mật khẩu - Baohiemso.net')
                ->send();
            //Chưa xử lý
            Yii::$app->session->setFlash('success', Yii::t('app','Reset mật khẩu thành công.'));
            return $this->redirect(['user/index']);
        }
    }
     public function actionKhoaTaiKhoan($id)
    {
        $user = User::findOne($id);
        $user->status = User::STATUS_DELETED;
        if ($user->save()){
            $send = Yii::$app->mailer->compose(['html' => '@common/mail/mail-khoa-tai-khoan'],['id' => $id])
                ->setFrom('auto@hellomedia.vn')
                ->setTo($user->email)
                ->setSubject('Thông báo xác thực tạm khóa tài khoản - Baohiemso.net')
                ->send();
            Yii::$app->session->setFlash('success', Yii::t('app','Tạm khóa tài khoản thành công.'));
            return $this->redirect(['user/index']);
        }
    }

    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}

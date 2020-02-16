<?php
namespace backend\controllers;

use common\models\Articles;
use common\models\Customer;
use common\models\InfoProfile;
use common\models\LogSystem;
use common\models\Offset;
use common\models\Parter;
use common\models\Products;
use common\models\User;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\ResetPasswordForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use vova07\console\ConsoleRunner;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error','request-password-reset','reset-password'],
                        'allow' => true,
                    ],
                    [
                        'actions' => [
                            'logout',
                            'signup',
                            'index'
                        ],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $countUser = User::find()->count();
        $countParter = Parter::find()->count();
        $customer = Customer::find()->count();
        $email = Offset::find()->count();
        $listCustomers = Customer::find()->orderBy(['id'=>SORT_DESC])->limit(5)->all();
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("
        select count(id), created_at from articles  group by from_unixtime(created_at, '%Y %D %M') order by created_at asc limit 3");
        $highChart = $command->queryAll();

        $articles = Articles::find()->orderBy(['id'=>SORT_DESC])->limit(5)->all();
        $products = Products::find()->orderBy(['id'=>SORT_DESC])->limit(10)->all();
//        echo '<pre>';
//        print_r($highChart);
//        die();
        //select count(id) from articles where status = 0 group by from_unixtime(created_at, '%Y %D %M') order by created_at asc limit 2;
        //higt chart articles sort date

        return $this->render('index',[
            'countUser' => $countUser,
            'countParter' => $countParter,
            'listCustomers' => $listCustomers,
            'articles' => $articles,
            'products' => $products,
            'email' => $email,
            'customer' => $customer,
        ]);
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * @param SiteController $createInfoprofile
     * @return string|\yii\web\Response
     */
    public static function actionSignup($createInfoprofile)
        {
            $model = new SignupForm();
            if ($model->load($createInfoprofile->request->post()) ) {
                $user = new User();
                $createInfoprofile->username = $createInfoprofile->username;
                $createInfoprofile->email = $createInfoprofile->email;
                $createInfoprofile->status = User::STATUS_ACTIVE;
                $user->setPassword($createInfoprofile->password);
                $user->generateAuthKey();
                $user->generateEmailVerificationToken();
                if ($user->save()){
                    // tạo acc inforProfile của tài khoản
                    $modelInfoProFile = new InfoProfile();
                    $createInfoprofile->user_id = $createInfoprofile->id;
                    $createInfoprofile->full_name = $createInfoprofile->username;
                    $modelInfoProFile->save();


                    $modelLog = new LogSystem();
                    $createInfoprofile->user_id = $createInfoprofile->id;
                    $createInfoprofile->created_at = strtotime('now');
                    $createInfoprofile->status = LogSystem::TT_TAOTAIKHOAN;
                    $modelLog->save();

                }
                $createInfoprofile->session->setFlash('success', 'Đăng ký tài khoản thành công.Vui lòng xác thực tài khoản qua email.');
                return $createInfoprofile->redirect('user/index');
            }

            return $createInfoprofile->render('signup', [
                'model' => $model,
            ]);
        }
    /**
     * Logout action.
     *
     * @return string
     */
    public function actionTest(){
        echo 'vào';
        die();
        $cr = new ConsoleRunner(['file' => '@app/yii']);
        $cr->run('user/index');
    }
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Vui lòng kiểm tra Email để được hướng dẫn.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Xin lỗi ,Tài khoản yêu cầu không tồn tại trong hệ thống.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {

        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    /**
     * Verify email address
     *
     * @param string $token
     * @throws BadRequestHttpException
     * @return yii\web\Response
     */
    public function actionVerifyEmail($token)
    {
        try {
            $model = new VerifyEmailForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($user = $model->verifyEmail()) {
            if (Yii::$app->user->login($user)) {
                Yii::$app->session->setFlash('success', 'Your email has been confirmed!');
                return $this->goHome();
            }
        }

        Yii::$app->session->setFlash('error', 'Sorry, we are unable to verify your account with provided token.');
        return $this->goHome();
    }

    /**
     * Resend verification email
     *
     * @return mixed
     */
    public function actionResendVerificationEmail()
    {
        $model = new ResendVerificationEmailForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                return $this->goHome();
            }
            Yii::$app->session->setFlash('error', 'Sorry, we are unable to resend verification email for the provided email address.');
        }

        return $this->render('resendVerificationEmail', [
            'model' => $model
        ]);
    }
}

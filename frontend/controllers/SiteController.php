<?php
namespace frontend\controllers;

use common\models\Banner;
use common\models\CatInsurrances;
use common\models\Otp;
use common\models\Products;
use frontend\models\ResendVerificationEmailForm;
use frontend\models\VerifyEmailForm;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use common\models\Articles;
use common\models\Contract;
use frontend\libs\Library;
use frontend\models\LoginForm;
use yii\web\Request;

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
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => [''],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => [''],
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

    public function actionIndex()
    {
        return $this->render('index', [
        ]);
    }

    public function  actionAbout()
    {
        return $this->render('about');
    }
    public function  actionBlog()
    {
        return $this->render('blog');
    }
    public function  actionFoodMenu()
    {
        return $this->render('food-menu');
    }
    public function  actionChefs()
    {
        return $this->render('chefs');
    }
    public function  actionContact()
    {
        if(Yii::$app->request->isPost){
            $email = Yii::$app->request->post('email');
            $subject = Yii::$app->request->post('subject');
            $message = Yii::$app->request->post('message');
            $name = Yii::$app->request->post('name');
            $subject = Yii::$app->request->post('subject');
            echo 'Email - '. $email . 'subject - '.$subject . 'message - '.$message;
            die();
        }
        return $this->render('contact',[
            'model'=>$model
        ]);
    }
    public function  actionViewArticle()
    {
        return $this->render('view-article');
    }
}

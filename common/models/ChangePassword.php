<?php
namespace frontend\models;

use common\models\InfoProfile;
use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class ChangePassword extends Model
{
    public $old_password;
    public $new_password;
    public $repeat_password;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return array(
            array('old_password, new_password, repeat_password', 'required', 'on' => 'changePwd'),
            array('old_password', 'findPasswords', 'on' => 'changePwd'),
            array('repeat_password', 'compare', 'compareAttribute'=>'new_password', 'on'=>'changePwd'),
        );
    }

    public function findPasswords($attribute, $params)
    {
        $user = User::model()->findByPk(Yii::app()->user->id);
        if ($user->password != md5($this->old_password))
            $this->addError($attribute, 'Old password is incorrect.');
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->generateEmailVerificationToken();
        if ($user->save()){
            // tạo acc inforProfile của tài khoản
            $modelInfoProFile = new InfoProfile();
            $modelInfoProFile->user_id = $user->id;
            $modelInfoProFile->save();
//            return $this->sendEmail($user);
        }
//        return $user->save() && $this->sendEmail($user);
    }

    /**
     * Sends confirmation email to user
     * @param User $user user model to with email should be send
     * @return bool whether the email was sent
     */
    protected function sendEmail($user)
    {
        return Yii::$app
            ->mailer
            ->compose(
//                ['html' => 'emailVerify-html', 'text' => 'emailVerify-text']
//                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Account registration at ' . Yii::$app->name)
            ->send();
    }
}

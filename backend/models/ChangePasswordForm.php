<?php
namespace backend\models;

use common\models\InfoProfile;
use common\models\LogSystem;
use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class ChangePasswordForm extends Model
{
    public $oldPassword;
    public $newPassword;
    public $retypePassword;
    /**
     * {@inheritdoc}
     */
  
    public function rules()
    {
        return [
            [['oldPassword', 'newPassword', 'retypePassword'], 'required'],
            [['oldPassword'], 'validatePassword'],
            [['newPassword'], 'string', 'min' => 6],
            [['retypePassword'], 'compare', 'compareAttribute' => 'newPassword'],
        ];
    }

    public function validatePassword()
    {
        $user = Yii::$app->user->identity;
        if (!$user || !$user->validatePassword($this->oldPassword)) {
            $this->addError('oldPassword', 'Mật khẩu không đúng, Vui lòng kiểm tra lại.');
        }
    }
    public function attributeLabels()
    {
        return [
            'oldPassword' => 'Mật khẩu cũ',
            'newPassword' => 'Mật khẩu mới',
            'retypePassword' => 'Nhập lại mật khẩu',
        ];
    }
}

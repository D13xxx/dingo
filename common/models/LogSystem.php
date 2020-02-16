<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "log_system".
 *
 * @property int $id
 * @property int $user_id
 * @property int $status
 * @property int $created_at
 */
class LogSystem extends \yii\db\ActiveRecord
{
    const TT_TAOTAIKHOAN            = 0;
    const TT_KHOATAIKHOAN           = 1;

    /**
     * @return array trang thai list
     */


    public static function TT_ARRAY()
    {
        return [
            self::TT_TAOTAIKHOAN => Yii::t('backend', 'Tạo tài khoản'),
            self::TT_KHOATAIKHOAN => Yii::t('backend', 'Khóa tài khoản'),
        ];
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'log_system';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'status', 'created_at'], 'required'],
            [['user_id', 'status', 'created_at'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'user_id' => Yii::t('common', 'User ID'),
            'status' => Yii::t('common', 'Status'),
            'created_at' => Yii::t('common', 'Created At'),
        ];
    }
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}

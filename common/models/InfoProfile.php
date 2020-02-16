<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "info_profile".
 *
 * @property int $id
 * @property string $full_name
 * @property int $birth_day
 * @property int $cell_phone
 * @property int $city
 * @property int $district
 * @property int $ward
 * @property string $avatar
 * @property int $gender
 * @property int $user_id
 */
class InfoProfile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    const GT_NAM = 1;
    const GT_NU = 2;
    const GT_KHAC = 3;
    public static function GT_ARRAY()
    {
        return [
            self::GT_NAM => 'Nam',
            self::GT_NU => 'Nữ',
            self::GT_KHAC => 'Khác',
        ];
    }

    public static function tableName()
    {
        return 'info_profile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['cell_phone', 'city', 'district', 'ward', 'gender', 'user_id'], 'integer'],
            [['avatar','full_name'], 'string'],
            [['birth_day'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'full_name' => 'Họ tên',
            'birth_day' => 'Ngày sinh',
            'cell_phone' => 'Số điện thoại',
            'city' => 'City',
            'district' => 'District',
            'ward' => 'Ward',
            'avatar' => 'Ảnh đại diện',
            'gender' => 'Giới tính',
            'user_id' => 'User ID',
        ];
    }
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}

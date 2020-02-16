<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "info_profile_fe".
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
class InfoProfileFe extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'info_profile_fe';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id'], 'required'],
            [['id', 'birth_day', 'cell_phone', 'city', 'district', 'ward', 'gender', 'user_id'], 'integer'],
            [['avatar'], 'string'],
            [['full_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'full_name' => 'Full Name',
            'birth_day' => 'Birth Day',
            'cell_phone' => 'Cell Phone',
            'city' => 'City',
            'district' => 'District',
            'ward' => 'Ward',
            'avatar' => 'Avatar',
            'gender' => 'Gender',
            'user_id' => 'User ID',
        ];
    }
}

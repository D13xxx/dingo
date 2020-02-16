<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "parter".
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string $avatar
 * @property int $created_at
 * @property int $updated_at
 * @property int $status
 */
class Parter extends \yii\db\ActiveRecord
{
    const TT_MOI                = 0;
    const TT_HOATDONG           = 1;
    /**
     * {@inheritdoc}
     */
    public static function TT_ARRAY()
    {
        return [
            self::TT_MOI => Yii::t('backend', 'Hoạt động'),
            self::TT_HOATDONG => Yii::t('backend', 'Mới'),
        ];
    }
    public static function TT_COLOR_ARRAY()
    {
        return [
            self::TT_MOI => 'label label-primary',
            self::TT_HOATDONG => 'label label-success',
        ];
    }
    public static function tableName()
    {
        return 'parter';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'name', 'avatar', 'created_at'], 'required'],
            [['created_at', 'updated_at','status'], 'integer'],
            [['code'], 'string', 'max' => 50],
            [['name'], 'string', 'max' => 255],
            [['avatar'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'code' => Yii::t('app', 'Mã'),
            'name' => Yii::t('app', 'Tên đầy đủ'),
            'avatar' => Yii::t('app', 'Ảnh đại diện'),
            'created_at' => Yii::t('app', 'Thời gian tạo'),
            'status' => Yii::t('app', 'Trạng thái'),
            'updated_at' => Yii::t('app', 'Thời gian cập nhật'),
        ];
    }
}

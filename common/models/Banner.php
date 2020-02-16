<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "banner".
 *
 * @property int $id
 * @property string $slug
 * @property string $image
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 */
class Banner extends \yii\db\ActiveRecord
{
    const TT_ACTIVE                = 0;
    const TT_DISABLE           = 1;
    /**
     * {@inheritdoc}
     */
    public static function TT_ARRAY()
    {
        return [
            self::TT_ACTIVE => Yii::t('backend', 'Hoạt động'),
            self::TT_DISABLE => Yii::t('backend', 'Vô hiệu hóa'),
        ];
    }
    public static function TT_COLOR_ARRAY()
    {
        return [
            self::TT_ACTIVE => 'badge-success',
            self::TT_DISABLE => 'badge-default',
        ];
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'banner';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'created_at'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['slug', 'image'], 'string', 'max' => 255],
            [['slug'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'slug' => Yii::t('common', 'Slug'),
            'image' => Yii::t('common', 'Ảnh'),
            'status' => Yii::t('common', 'Trạng thái'),
            'created_at' => Yii::t('common', 'Created At'),
            'updated_at' => Yii::t('common', 'Updated At'),
        ];
    }
}

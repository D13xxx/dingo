<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "about_us".
 *
 * @property int $id
 * @property string $iframe
 */
class AboutUs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'about_us';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'iframe'], 'required'],
            [['id'], 'integer'],
            [['iframe'], 'string', 'max' => 255],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'iframe' => Yii::t('common', 'Iframe'),
        ];
    }
}

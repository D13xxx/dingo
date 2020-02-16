<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cat_articles".
 *
 * @property int $id
 * @property string $name
 * @property int $parent_id
 * @property int $level
 * @property string $code
 */
class CatArticles extends \yii\db\ActiveRecord
{
    const IS_ACTIVE         = 1;
    const IS_NEW           = 0;

    /**
     * @return array trang thai list
     */


    public static function TT_ARRAY()
    {
        return [
            self::IS_ACTIVE => Yii::t('backend', 'Hoạt động'),
            self::IS_NEW => Yii::t('backend', 'Mới'),
        ];
    }
    public static function TT_COLOR_ARRAY()
    {
        return [
            self::IS_NEW => 'badge-default',
            self::IS_ACTIVE => 'badge-success',
        ];
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cat_articles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'level'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['code'], 'string', 'max' => 50],
            [['name'], 'unique'],
            [['status'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Tên đầy đủ',
            'parent_id' => 'Nhóm cha',
            'level' => 'Level',
            'code' => 'Mã ',
        ];
    }
    //lọc dữ liệu dropdown list
    public $data;
    public function getCat($parentId = null,$level="")
    {
        $result = CatArticles::find()->asArray()->where(['parent_id'=>$parentId])->all();

        $level .= " |-- ";
        foreach ($result as $key => $value){
            if($parentId == null){
                $level = '';
            }
            $this->data[$value["id"]]  = $level.$value["name"];
            self::getCat($parentId = $value["id"],$level);
        }
        return $this->data;
    }
}

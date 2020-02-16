<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tags".
 *
 * @property int $id
 * @property string $tag_name
 * @property int $articles_id
 */
class Tags extends \yii\db\ActiveRecord
{
    public $articlesName;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tags';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tag_name', 'articles_id'], 'required'],
            [['articles_id'], 'integer'],
            [['tag_name','articlesName'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tag_name' => 'Thẻ tags',
            'articles_id' => 'Articles ID',
            'articlesName'=>'Bài viết',
        ];
    }
    public function getArticles(){
        return $this->hasOne(Articles::className(), ['id' => 'articles_id']);
    }
}

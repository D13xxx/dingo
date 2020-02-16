<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "articles".
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string $desc
 * @property string $content
 * @property string $avatar
 * @property int $cat_articles_id
 * @property string $file
 * @property int $author
 * @property int $status
 * @property int $is_hot_new
 * @property int $views
 * @property int $created_at
 * @property int $updated_at
 * @property int $is_del
 */
class Articles extends \yii\db\ActiveRecord
{
    const TT_MOI            = 0;
    const TT_CHOKIEMDUYET     = 1;
    const TT_DUOCDUYET      = 2;
    const TT_KIEMTRALAI     = 3;


    const IS_ACTIVE         = 0;
    const IS_DEL            = 1;

    /**
     * @return array trang thai list
     */


    public static function TT_ARRAY()
    {
        return [
            self::TT_MOI => Yii::t('backend', 'Mới tạo'),
            self::TT_DUOCDUYET => Yii::t('backend', 'Được duyệt'),
            self::TT_KIEMTRALAI => Yii::t('backend', 'Kiểm tra lại'),
            self::TT_CHOKIEMDUYET => Yii::t('backend', 'Kiểm duyệt'),
        ];
    }
    public static function TT_COLOR_ARRAY()
    {
        return [
            self::TT_MOI => 'badge-default',
            self::TT_DUOCDUYET => 'badge-success',
            self::TT_KIEMTRALAI => 'badge-eurro',
            self::TT_CHOKIEMDUYET => 'badge-warning',
        ];
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'articles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'slug', 'cat_articles_id', 'author','avatar' ,'status', 'created_at'], 'required'],
            [['desc',  'file','tags'], 'string'],
            [['cat_articles_id', 'author', 'status', 'is_hot_new', 'views', 'created_at', 'updated_at', 'is_del'], 'integer'],
            [['title', 'slug','title_seo','description_seo','keyword_seo'], 'string', 'max' => 255],
            [['title'], 'string', 'max' => 70],
            [['desc'], 'string', 'max' => 160],
            [['title'], 'unique'],
            [['avatar','content'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Tiêu đề bài viết',
            'slug' => 'Slug',
            'desc' => 'Mô tả ngắn',
            'content' => 'Nội dung bài viết',
            'avatar' => 'Ảnh tiêu đề',
            'cat_articles_id' => 'Nhóm bài viết',
            'file' => 'File',
            'author' => 'Tác giả',
            'status' => 'Trạng thái',
            'is_hot_new' => 'Bài viết nổi bật',
            'views' => 'Lượt xem',
            'created_at' => 'Ngày tạo',
            'updated_at' => 'Ngày cập nhật',
            'is_del' => 'Is Del',
        ];
    }
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'author']);
    }
    public function getCatArtiles()
    {
        return $this->hasOne(CatArticles::className(), ['id' => 'cat_articles_id']);
    }
}

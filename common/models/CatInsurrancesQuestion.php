<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cat_insurrances_question".
 *
 * @property int $id
 * @property string $question
 * @property string $answer
 * @property int $cat_insurrances_id
 * @property int $created_at
 * @property int $updated_at
 */
class CatInsurrancesQuestion extends \yii\db\ActiveRecord
{
    const T_QUYENLOIBAOHIEM = 0;
    const T_DIEUKIENTHAMGIA = 1;
    const T_THANHTOANPHI = 2;
    const T_HOPDONGBAOHIEM = 3;
    const T_BOITHUONG = 4;
    public static function T_ARRAY()
    {
        return [
            self::T_QUYENLOIBAOHIEM => Yii::t('backend', 'Quyền lợi bảo hiểm'),
            self::T_DIEUKIENTHAMGIA => Yii::t('backend', 'Điều kiện tham gia'),
            self::T_THANHTOANPHI => Yii::t('backend', 'Thanh toán phí'),
            self::T_HOPDONGBAOHIEM => Yii::t('backend', 'Hợp đồng bảo hiểm'),
            self::T_BOITHUONG => Yii::t('backend', 'Bồi thường'),
        ];
    }
    public static function T_COLOR_ARRAY()
    {
        return [
            self::T_QUYENLOIBAOHIEM => 'label label-primary',
            self::T_DIEUKIENTHAMGIA => 'label label-danger',
            self::T_THANHTOANPHI => 'label label-default',
            self::T_HOPDONGBAOHIEM => 'label label-success',
            self::T_BOITHUONG => 'label label-warning',
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cat_insurrances_question';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['question', 'answer', 'cat_insurrances_id', 'created_at'], 'required'],
            [['answer'], 'string'],
            [['cat_insurrances_id', 'created_at', 'updated_at','type'], 'integer'],
            [['question'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'question' => Yii::t('common', 'Câu hỏi'),
            'answer' => Yii::t('common', 'Đáp án trả lời'),
            'cat_insurrances_id' => Yii::t('common', 'Nhóm bảo hiểm'),
            'created_at' => Yii::t('common', 'Created At'),
            'updated_at' => Yii::t('common', 'Updated At'),
            'type' => Yii::t('common', 'Dạng câu hỏi'),
        ];
    }
}

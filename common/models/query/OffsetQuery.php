<?php

namespace common\models\query;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Offset;

/**
 * OffsetQuery represents the model behind the search form of `common\models\Offset`.
 */
class OffsetQuery extends Offset
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'cell_phone', 'interest'], 'integer'],
            [['full_name', 'description', 'file'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Offset::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'cell_phone' => $this->cell_phone,
            'interest' => $this->interest,
        ]);

        $query->andFilterWhere(['like', 'full_name', $this->full_name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'file', $this->file]);

        return $dataProvider;
    }
}

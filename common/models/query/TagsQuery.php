<?php

namespace common\models\query;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Tags;

/**
 * TagsQuery represents the model behind the search form of `common\models\Tags`.
 */
class TagsQuery extends Tags
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'articles_id'], 'integer'],
            [['tag_name'], 'safe'],
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
        $query = Tags::find();

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
            'articles_id' => $this->articles_id,
        ]);

        $query->andFilterWhere(['like', 'tag_name', $this->tag_name]);

        return $dataProvider;
    }
}

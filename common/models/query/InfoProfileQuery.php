<?php

namespace common\models\query;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\InfoProfile;

/**
 * InfoProfileQuery represents the model behind the search form of `common\models\InfoProfile`.
 */
class InfoProfileQuery extends InfoProfile
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'birth_day', 'cell_phone', 'city', 'district', 'ward', 'gender', 'user_id'], 'integer'],
            [['full_name', 'avatar'], 'safe'],
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
        $query = InfoProfile::find();

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
            'birth_day' => $this->birth_day,
            'cell_phone' => $this->cell_phone,
            'city' => $this->city,
            'district' => $this->district,
            'ward' => $this->ward,
            'gender' => $this->gender,
            'user_id' => $this->user_id,
        ]);

        $query->andFilterWhere(['like', 'full_name', $this->full_name])
            ->andFilterWhere(['like', 'avatar', $this->avatar]);

        return $dataProvider;
    }
}

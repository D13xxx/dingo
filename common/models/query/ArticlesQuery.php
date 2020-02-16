<?php

namespace common\models\query;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Articles;

/**
 * ArticlesQuery represents the model behind the search form of `common\models\Articles`.
 */
class ArticlesQuery extends Articles
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'cat_articles_id', 'author', 'status', 'is_hot_new', 'views', 'created_at', 'updated_at', 'is_del'], 'integer'],
            [['title', 'slug', 'desc', 'content', 'avatar', 'file', 'tags'], 'safe'],
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
        $query = Articles::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 30,
            ],
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
            'cat_articles_id' => $this->cat_articles_id,
            'author' => $this->author,
            'status' => $this->status,
            'is_hot_new' => $this->is_hot_new,
            'views' => $this->views,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'is_del' => $this->is_del,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'desc', $this->desc])
            ->andFilterWhere(['like', 'content', $this->content])
            ->andFilterWhere(['like', 'avatar', $this->avatar])
            ->andFilterWhere(['like', 'file', $this->file])
            ->andFilterWhere(['like', 'tags', $this->tags]);

        return $dataProvider;
    }
}
<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\poliklinik;

/**
 * PoliklinikSearch represents the model behind the search form of `backend\models\poliklinik`.
 */
class PoliklinikSearch extends poliklinik
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['poliklinik_id'], 'integer'],
            [['poliklinik_nama', 'keterangan'], 'safe'],
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
        $query = poliklinik::find();

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
            'poliklinik_id' => $this->poliklinik_id,
        ]);

        $query->andFilterWhere(['like', 'poliklinik_nama', $this->poliklinik_nama])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan]);

        return $dataProvider;
    }
}

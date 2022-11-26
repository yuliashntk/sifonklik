<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\resep;

/**
 * ResepSearch represents the model behind the search form of `backend\models\resep`.
 */
class ResepSearch extends resep
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['resep_id', 'obat_id', 'periksa_id'], 'integer'],
            [['total_harga', 'aturan'], 'safe'],
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
        $query = resep::find();

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
            'resep_id' => $this->resep_id,
            'obat_id' => $this->obat_id,
            'periksa_id' => $this->periksa_id,
        ]);

        $query->andFilterWhere(['like', 'total_harga', $this->total_harga])
            ->andFilterWhere(['like', 'aturan', $this->aturan]);

        return $dataProvider;
    }
}

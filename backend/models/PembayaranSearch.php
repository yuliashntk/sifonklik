<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\pembayaran;

/**
 * PembayaranSearch represents the model behind the search form of `backend\models\pembayaran`.
 */
class PembayaranSearch extends pembayaran
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pembayaran_id', 'resep_id', 'periksa_id'], 'integer'],
            [['biaya_periksa', 'total'], 'safe'],
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
        $query = pembayaran::find();

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
            'pembayaran_id' => $this->pembayaran_id,
            'resep_id' => $this->resep_id,
            'periksa_id' => $this->periksa_id,
        ]);

        $query->andFilterWhere(['like', 'biaya_periksa', $this->biaya_periksa])
            ->andFilterWhere(['like', 'total', $this->total]);

        return $dataProvider;
    }
}

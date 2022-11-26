<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\daftarperiksa;

/**
 * DaftarPeriksaSearch represents the model behind the search form of `backend\models\daftarperiksa`.
 */
class DaftarPeriksaSearch extends daftarperiksa
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['daftar_id', 'pasien_id', 'dokter_id'], 'integer'],
            [['tanggal', 'keluhan'], 'safe'],
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
        $query = daftarperiksa::find();

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
            'daftar_id' => $this->daftar_id,
            'pasien_id' => $this->pasien_id,
            'dokter_id' => $this->dokter_id,
            'tanggal' => $this->tanggal,
        ]);

        $query->andFilterWhere(['like', 'keluhan', $this->keluhan]);

        return $dataProvider;
    }
}

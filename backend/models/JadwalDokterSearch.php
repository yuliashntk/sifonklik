<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\jadwaldokter;

/**
 * JadwalDokterSearch represents the model behind the search form of `backend\models\jadwaldokter`.
 */
class JadwalDokterSearch extends jadwaldokter
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['jadwal_id', 'dokter_id'], 'integer'],
            [['waktu_mulai', 'waktu_selesai'], 'safe'],
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
        $query = jadwaldokter::find();

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
            'jadwal_id' => $this->jadwal_id,
            'waktu_mulai' => $this->waktu_mulai,
            'waktu_selesai' => $this->waktu_selesai,
            'dokter_id' => $this->dokter_id,
        ]);

        return $dataProvider;
    }
}

<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\periksa;

/**
 * PeriksaSearch represents the model behind the search form of `backend\models\periksa`.
 */
class PeriksaSearch extends periksa
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['periksa_id', 'bb', 'tb', 'dokter_id', 'pasien_id', 'tindakan_id', 'daftar_id'], 'integer'],
            [['goldar', 'diagnosa', 'catatan'], 'safe'],
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
        $query = periksa::find();

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
            'periksa_id' => $this->periksa_id,
            'bb' => $this->bb,
            'tb' => $this->tb,
            'dokter_id' => $this->dokter_id,
            'pasien_id' => $this->pasien_id,
            'tindakan_id' => $this->tindakan_id,
            'daftar_id' => $this->daftar_id,
        ]);

        $query->andFilterWhere(['like', 'goldar', $this->goldar])
            ->andFilterWhere(['like', 'diagnosa', $this->diagnosa])
            ->andFilterWhere(['like', 'catatan', $this->catatan]);

        return $dataProvider;
    }
}

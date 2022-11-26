<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\dokter;

/**
 * DokterSearch represents the model behind the search form of `backend\models\dokter`.
 */
class DokterSearch extends dokter
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dokter_id', 'poliklinik_id'], 'integer'],
            [['dokter_nama', 'email', 'username', 'password', 'no_hp', 'alamat', 'agama', 'tempat_lahir', 'tanggal_lahir', 'no_praktek'], 'safe'],
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
        $query = dokter::find();

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
            'dokter_id' => $this->dokter_id,
            'tanggal_lahir' => $this->tanggal_lahir,
            'poliklinik_id' => $this->poliklinik_id,
        ]);

        $query->andFilterWhere(['like', 'dokter_nama', $this->dokter_nama])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'no_hp', $this->no_hp])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'agama', $this->agama])
            ->andFilterWhere(['like', 'tempat_lahir', $this->tempat_lahir])
            ->andFilterWhere(['like', 'no_praktek', $this->no_praktek]);

        return $dataProvider;
    }
}

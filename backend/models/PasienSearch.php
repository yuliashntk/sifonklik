<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\pasien;

/**
 * PasienSearch represents the model behind the search form of `backend\models\pasien`.
 */
class PasienSearch extends pasien
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pasien_id'], 'integer'],
            [['pasien_nama', 'email', 'username', 'password', 'no_hp', 'alamat', 'agama', 'tempat_lahir', 'tanggal_lahir'], 'safe'],
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
        $query = pasien::find();

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
            'pasien_id' => $this->pasien_id,
            'tanggal_lahir' => $this->tanggal_lahir,
        ]);

        $query->andFilterWhere(['like', 'pasien_nama', $this->pasien_nama])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'password', $this->password])
            ->andFilterWhere(['like', 'no_hp', $this->no_hp])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'agama', $this->agama])
            ->andFilterWhere(['like', 'tempat_lahir', $this->tempat_lahir]);

        return $dataProvider;
    }
}

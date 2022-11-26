<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\obat;

/**
 * ObatSearch represents the model behind the search form of `backend\models\obat`.
 */
class ObatSearch extends obat
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_obat', 'harga', 'stok'], 'integer'],
            [['obat_nama', 'satuan', 'produksi'], 'safe'],
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
        $query = obat::find();

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
            'id_obat' => $this->id_obat,
            'harga' => $this->harga,
            'stok' => $this->stok,
        ]);

        $query->andFilterWhere(['like', 'obat_nama', $this->obat_nama])
            ->andFilterWhere(['like', 'satuan', $this->satuan])
            ->andFilterWhere(['like', 'produksi', $this->produksi]);

        return $dataProvider;
    }
}

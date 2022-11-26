<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\admin;

/**
 * AdminSearch represents the model behind the search form of `backend\models\admin`.
 */
class AdminSearch extends admin
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['admin_id'], 'integer'],
            [['admin_nama', 'email', 'username', 'password', 'no_hp', 'alamat', 'agama', 'tempat_lahir', 'tanggal_lahir'], 'safe'],
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
        $query = admin::find();

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
            'admin_id' => $this->admin_id,
            'tanggal_lahir' => $this->tanggal_lahir,
        ]);

        $query->andFilterWhere(['like', 'admin_nama', $this->admin_nama])
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

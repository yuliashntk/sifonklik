<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "obat".
 *
 * @property int $id_obat
 * @property string $obat_nama
 * @property int $harga
 * @property int $stok
 * @property string $satuan
 * @property string $produksi
 *
 * @property Resep[] $reseps
 */
class Obat extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'obat';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['obat_nama', 'harga', 'stok', 'satuan', 'produksi'], 'required'],
            [['harga', 'stok'], 'integer'],
            [['obat_nama'], 'string', 'max' => 100],
            [['satuan'], 'string', 'max' => 15],
            [['produksi'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_obat' => 'Id Obat',
            'obat_nama' => 'Obat Nama',
            'harga' => 'Harga',
            'stok' => 'Stok',
            'satuan' => 'Satuan',
            'produksi' => 'Produksi',
        ];
    }

    /**
     * Gets query for [[Reseps]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReseps()
    {
        return $this->hasMany(Resep::class, ['obat_id' => 'id_obat']);
    }
}

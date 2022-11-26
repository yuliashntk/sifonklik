<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "resep".
 *
 * @property int $resep_id
 * @property string $total_harga
 * @property int $obat_id
 * @property int $periksa_id
 * @property string $aturan
 *
 * @property Obat $obat
 * @property Periksa $periksa
 */
class Resep extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'resep';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['total_harga', 'obat_id', 'periksa_id', 'aturan'], 'required'],
            [['obat_id', 'periksa_id'], 'integer'],
            [['total_harga', 'aturan'], 'string', 'max' => 20],
            [['obat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Obat::class, 'targetAttribute' => ['obat_id' => 'id_obat']],
            [['periksa_id'], 'exist', 'skipOnError' => true, 'targetClass' => Periksa::class, 'targetAttribute' => ['periksa_id' => 'periksa_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'resep_id' => 'ID Resep',
            'total_harga' => 'Total Harga',
            'obat_id' => 'Obat',
            'periksa_id' => 'ID Periksa',
            'aturan' => 'Aturan',
        ];
    }

    /**
     * Gets query for [[Obat]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getObat()
    {
        return $this->hasOne(Obat::class, ['id_obat' => 'obat_id']);
    }

    /**
     * Gets query for [[Periksa]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPeriksa()
    {
        return $this->hasOne(Periksa::class, ['periksa_id' => 'periksa_id']);
    }
}

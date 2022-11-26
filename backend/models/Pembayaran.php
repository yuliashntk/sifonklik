<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "pembayaran".
 *
 * @property int $pembayaran_id
 * @property string $biaya_periksa
 * @property string $total
 * @property int $resep_id
 * @property int $periksa_id
 *
 * @property Periksa $periksa
 */
class Pembayaran extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pembayaran';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['biaya_periksa', 'total', 'resep_id', 'periksa_id'], 'required'],
            [['resep_id', 'periksa_id'], 'integer'],
            [['biaya_periksa', 'total'], 'string', 'max' => 20],
            [['periksa_id'], 'exist', 'skipOnError' => true, 'targetClass' => Periksa::class, 'targetAttribute' => ['periksa_id' => 'periksa_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pembayaran_id' => 'ID Pembayaran',
            'biaya_periksa' => 'Biaya Periksa',
            'total' => 'Total',
            'resep_id' => 'ID Resep',
            'periksa_id' => 'ID Periksa',
        ];
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

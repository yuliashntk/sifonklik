<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "poliklinik".
 *
 * @property int $poliklinik_id
 * @property string $poliklinik_nama
 * @property string $keterangan
 *
 * @property Dokter[] $dokters
 */
class Poliklinik extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'poliklinik';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['poliklinik_nama', 'keterangan'], 'required'],
            [['keterangan'], 'string'],
            [['poliklinik_nama'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'poliklinik_id' => 'ID Poliklinik',
            'poliklinik_nama' => 'Nama Poliklinik',
            'keterangan' => 'Keterangan',
        ];
    }

    /**
     * Gets query for [[Dokters]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDokters()
    {
        return $this->hasMany(Dokter::class, ['poliklinik_id' => 'poliklinik_id']);
    }
}

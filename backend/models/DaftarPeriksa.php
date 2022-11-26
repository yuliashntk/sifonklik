<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "daftar_periksa".
 *
 * @property int $daftar_id
 * @property int $pasien_id
 * @property int $dokter_id
 * @property string $tanggal
 * @property string $keluhan
 *
 * @property Dokter $dokter
 * @property Pasien $pasien
 * @property Periksa[] $periksas
 */
class DaftarPeriksa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'daftar_periksa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pasien_id', 'dokter_id', 'tanggal', 'keluhan'], 'required'],
            [['pasien_id', 'dokter_id'], 'integer'],
            [['tanggal'], 'safe'],
            [['keluhan'], 'string'],
            [['pasien_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pasien::class, 'targetAttribute' => ['pasien_id' => 'pasien_id']],
            [['dokter_id'], 'exist', 'skipOnError' => true, 'targetClass' => Dokter::class, 'targetAttribute' => ['dokter_id' => 'dokter_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'daftar_id' => 'ID Daftar',
            'pasien_id' => 'Pasien',
            'dokter_id' => 'Dokter',
            'tanggal' => 'Tanggal',
            'keluhan' => 'Keluhan',
        ];
    }

    /**
     * Gets query for [[Dokter]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDokter()
    {
        return $this->hasOne(Dokter::class, ['dokter_id' => 'dokter_id']);
    }

    /**
     * Gets query for [[Pasien]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPasien()
    {
        return $this->hasOne(Pasien::class, ['pasien_id' => 'pasien_id']);
    }

    /**
     * Gets query for [[Periksas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPeriksas()
    {
        return $this->hasMany(Periksa::class, ['daftar_id' => 'daftar_id']);
    }
}

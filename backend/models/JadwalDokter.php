<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "jadwal_dokter".
 *
 * @property int $jadwal_id
 * @property string $waktu_mulai
 * @property string $waktu_selesai
 * @property int $dokter_id
 *
 * @property Dokter $dokter
 */
class JadwalDokter extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jadwal_dokter';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['waktu_mulai', 'waktu_selesai', 'dokter_id'], 'required'],
            [['waktu_mulai', 'waktu_selesai'], 'safe'],
            [['dokter_id'], 'integer'],
            [['dokter_id'], 'exist', 'skipOnError' => true, 'targetClass' => Dokter::class, 'targetAttribute' => ['dokter_id' => 'dokter_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'jadwal_id' => 'ID Jadwal',
            'waktu_mulai' => 'Waktu Mulai',
            'waktu_selesai' => 'Waktu Selesai',
            'dokter_id' => 'ID Dokter',
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
}

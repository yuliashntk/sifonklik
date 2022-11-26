<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "periksa".
 *
 * @property int $periksa_id
 * @property int $bb
 * @property int $tb
 * @property string $goldar
 * @property string $diagnosa
 * @property string $catatan
 * @property int $dokter_id
 * @property int $pasien_id
 * @property int $tindakan_id
 * @property int $daftar_id
 *
 * @property DaftarPeriksa $daftar
 * @property Dokter $dokter
 * @property Pasien $pasien
 * @property Pembayaran[] $pembayarans
 * @property Resep[] $reseps
 * @property Tindakan $tindakan
 */
class Periksa extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'periksa';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['bb', 'tb', 'goldar', 'diagnosa', 'catatan', 'dokter_id', 'pasien_id', 'tindakan_id', 'daftar_id'], 'required'],
            [['bb', 'tb', 'dokter_id', 'pasien_id', 'tindakan_id', 'daftar_id'], 'integer'],
            [['diagnosa', 'catatan'], 'string'],
            [['goldar'], 'string', 'max' => 2],
            [['dokter_id'], 'exist', 'skipOnError' => true, 'targetClass' => Dokter::class, 'targetAttribute' => ['dokter_id' => 'dokter_id']],
            [['tindakan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tindakan::class, 'targetAttribute' => ['tindakan_id' => 'tindakan_id']],
            [['daftar_id'], 'exist', 'skipOnError' => true, 'targetClass' => DaftarPeriksa::class, 'targetAttribute' => ['daftar_id' => 'daftar_id']],
            [['pasien_id'], 'exist', 'skipOnError' => true, 'targetClass' => Pasien::class, 'targetAttribute' => ['pasien_id' => 'pasien_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'periksa_id' => 'Periksa ID',
            'bb' => 'BB',
            'tb' => 'TB',
            'goldar' => 'Goldar',
            'diagnosa' => 'Diagnosa',
            'catatan' => 'Catatan',
            'dokter_id' => 'Dokter',
            'pasien_id' => 'Pasien',
            'tindakan_id' => 'Tindakan',
            'daftar_id' => 'ID Daftar',
        ];
    }

    /**
     * Gets query for [[Daftar]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDaftar()
    {
        return $this->hasOne(DaftarPeriksa::class, ['daftar_id' => 'daftar_id']);
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
     * Gets query for [[Pembayarans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPembayarans()
    {
        return $this->hasMany(Pembayaran::class, ['periksa_id' => 'periksa_id']);
    }

    /**
     * Gets query for [[Reseps]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReseps()
    {
        return $this->hasMany(Resep::class, ['periksa_id' => 'periksa_id']);
    }

    /**
     * Gets query for [[Tindakan]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTindakan()
    {
        return $this->hasOne(Tindakan::class, ['tindakan_id' => 'tindakan_id']);
    }
}

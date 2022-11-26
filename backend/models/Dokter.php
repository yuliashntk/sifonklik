<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "dokter".
 *
 * @property int $dokter_id
 * @property string $dokter_nama
 * @property string $email
 * @property string $username
 * @property string $password
 * @property string $no_hp
 * @property string $alamat
 * @property string $agama
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property string $no_praktek
 * @property int $poliklinik_id
 *
 * @property DaftarPeriksa[] $daftarPeriksas
 * @property JadwalDokter[] $jadwalDokters
 * @property Periksa[] $periksas
 * @property Poliklinik $poliklinik
 */
class Dokter extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'dokter';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['dokter_nama', 'email', 'username', 'password', 'no_hp', 'alamat', 'agama', 'tempat_lahir', 'tanggal_lahir', 'no_praktek', 'poliklinik_id'], 'required'],
            [['tanggal_lahir'], 'safe'],
            [['poliklinik_id'], 'integer'],
            [['dokter_nama', 'email', 'username', 'password', 'alamat', 'tempat_lahir'], 'string', 'max' => 40],
            [['no_hp'], 'string', 'max' => 12],
            [['agama', 'no_praktek'], 'string', 'max' => 20],
            [['poliklinik_id'], 'exist', 'skipOnError' => true, 'targetClass' => Poliklinik::class, 'targetAttribute' => ['poliklinik_id' => 'poliklinik_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'dokter_id' => 'ID Dokter',
            'dokter_nama' => 'Nama Dokter',
            'email' => 'Email',
            'username' => 'Username',
            'password' => 'Password',
            'no_hp' => 'No Hp',
            'alamat' => 'Alamat',
            'agama' => 'Agama',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'no_praktek' => 'No Praktek',
            'poliklinik_id' => 'Poliklinik',
        ];
    }

    /**
     * Gets query for [[DaftarPeriksas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDaftarPeriksas()
    {
        return $this->hasMany(DaftarPeriksa::class, ['dokter_id' => 'dokter_id']);
    }

    /**
     * Gets query for [[JadwalDokters]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJadwalDokters()
    {
        return $this->hasMany(JadwalDokter::class, ['dokter_id' => 'dokter_id']);
    }

    /**
     * Gets query for [[Periksas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPeriksas()
    {
        return $this->hasMany(Periksa::class, ['dokter_id' => 'dokter_id']);
    }

    /**
     * Gets query for [[Poliklinik]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPoliklinik()
    {
        return $this->hasOne(Poliklinik::class, ['poliklinik_id' => 'poliklinik_id']);
    }
}

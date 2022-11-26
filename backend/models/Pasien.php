<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "pasien".
 *
 * @property int $pasien_id
 * @property string $pasien_nama
 * @property string $email
 * @property string $username
 * @property string $password
 * @property string $no_hp
 * @property string $alamat
 * @property string $agama
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 *
 * @property DaftarPeriksa[] $daftarPeriksas
 * @property Periksa[] $periksas
 */
class Pasien extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pasien';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pasien_id', 'pasien_nama', 'email', 'username', 'password', 'no_hp', 'alamat', 'agama', 'tempat_lahir', 'tanggal_lahir'], 'required'],
            [['pasien_id'], 'integer'],
            [['tanggal_lahir'], 'safe'],
            [['pasien_nama', 'email', 'username', 'password', 'alamat', 'tempat_lahir'], 'string', 'max' => 40],
            [['no_hp'], 'string', 'max' => 12],
            [['agama'], 'string', 'max' => 20],
            [['pasien_id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pasien_id' => 'Pasien ID',
            'pasien_nama' => 'Pasien Nama',
            'email' => 'Email',
            'username' => 'Username',
            'password' => 'Password',
            'no_hp' => 'No Hp',
            'alamat' => 'Alamat',
            'agama' => 'Agama',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
        ];
    }

    /**
     * Gets query for [[DaftarPeriksas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDaftarPeriksas()
    {
        return $this->hasMany(DaftarPeriksa::class, ['pasien_id' => 'pasien_id']);
    }

    /**
     * Gets query for [[Periksas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPeriksas()
    {
        return $this->hasMany(Periksa::class, ['pasien_id' => 'pasien_id']);
    }
}

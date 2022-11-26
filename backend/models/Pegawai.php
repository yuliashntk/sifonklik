<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "pegawai".
 *
 * @property int $pegawai_id
 * @property string $pegawai_nama
 * @property string $email
 * @property string $username
 * @property string $password
 * @property string $no_hp
 * @property string $alamat
 * @property string $agama
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 */
class Pegawai extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pegawai';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pegawai_nama', 'email', 'username', 'password', 'no_hp', 'alamat', 'agama', 'tempat_lahir', 'tanggal_lahir'], 'required'],
            [['tanggal_lahir'], 'safe'],
            [['pegawai_nama', 'email', 'username', 'password', 'alamat', 'tempat_lahir'], 'string', 'max' => 40],
            [['no_hp'], 'string', 'max' => 12],
            [['agama'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pegawai_id' => 'ID Pegawai',
            'pegawai_nama' => 'Nama Pegawai',
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
}

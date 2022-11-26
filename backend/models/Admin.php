<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "admin".
 *
 * @property int $admin_id
 * @property string $admin_nama
 * @property string $email
 * @property string $username
 * @property string $password
 * @property string $no_hp
 * @property string $alamat
 * @property string $agama
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 */
class Admin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'admin';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['admin_nama', 'email', 'username', 'password', 'no_hp', 'alamat', 'agama', 'tempat_lahir', 'tanggal_lahir'], 'required'],
            [['tanggal_lahir'], 'safe'],
            [['admin_nama', 'email', 'username', 'password', 'alamat', 'tempat_lahir'], 'string', 'max' => 40],
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
            'admin_id' => 'ID Admin',
            'admin_nama' => 'Nama Admin',
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

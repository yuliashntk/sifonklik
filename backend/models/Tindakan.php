<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "tindakan".
 *
 * @property int $tindakan_id
 * @property string $tindakan_nama
 * @property int $harga
 *
 * @property Periksa[] $periksas
 */
class Tindakan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tindakan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tindakan_nama', 'harga'], 'required'],
            [['harga'], 'integer'],
            [['tindakan_nama'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'tindakan_id' => ' ID Tindakan',
            'tindakan_nama' => 'Tindakan',
            'harga' => 'Harga',
        ];
    }

    /**
     * Gets query for [[Periksas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPeriksas()
    {
        return $this->hasMany(Periksa::class, ['tindakan_id' => 'tindakan_id']);
    }
}

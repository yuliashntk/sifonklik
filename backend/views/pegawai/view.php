<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\pegawai $model */

$this->title = $model->pegawai_nama;
$this->params['breadcrumbs'][] = ['label' => 'Pegawais', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pegawai-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Edit', ['update', 'pegawai_id' => $model->pegawai_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'pegawai_id' => $model->pegawai_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'pegawai_id',
            'pegawai_nama',
            'email:email',
            'username',
            'password',
            'no_hp',
            'alamat',
            'agama',
            'tempat_lahir',
            'tanggal_lahir',
        ],
    ]) ?>

</div>

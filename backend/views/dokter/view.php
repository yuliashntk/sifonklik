<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\dokter $model */

$this->title = $model->dokter_nama;
$this->params['breadcrumbs'][] = ['label' => 'Dokters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="dokter-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Edit', ['update', 'dokter_id' => $model->dokter_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'dokter_id' => $model->dokter_id], [
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
       //     'dokter_id',
            'dokter_nama',
            'email:email',
            'username',
            'password',
            'no_hp',
            'alamat',
            'agama',
            'tempat_lahir',
            'tanggal_lahir',
            'no_praktek',
            'poliklinik.poliklinik_nama',
        ],
    ]) ?>

</div>

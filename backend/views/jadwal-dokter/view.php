<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\jadwaldokter $model */

$this->title = $model->jadwal_id;
$this->params['breadcrumbs'][] = ['label' => 'Jadwaldokters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="jadwaldokter-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Edit', ['update', 'jadwal_id' => $model->jadwal_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'jadwal_id' => $model->jadwal_id], [
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
            'jadwal_id',
            'waktu_mulai',
            'waktu_selesai',
            'dokter.dokter_nama',
        ],
    ]) ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\daftarperiksa $model */

$this->title = $model->daftar_id;
$this->params['breadcrumbs'][] = ['label' => 'Daftarperiksas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="daftarperiksa-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'daftar_id' => $model->daftar_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'daftar_id' => $model->daftar_id], [
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
            'daftar_id',
            'pasien.pasien_nama',
            'dokter.dokter_nama',
            'tanggal',
            'keluhan:ntext',
        ],
    ]) ?>

</div>

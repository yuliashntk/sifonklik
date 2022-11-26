<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\periksa $model */

$this->title = $model->periksa_id;
$this->params['breadcrumbs'][] = ['label' => 'Periksas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="periksa-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Edit', ['update', 'periksa_id' => $model->periksa_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'periksa_id' => $model->periksa_id], [
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
            'periksa_id',
            'dokter.dokter_nama',
            'pasien.pasien_nama',
            'tindakan.tindakan_nama',
            'bb',
            'tb',
            'goldar',
            'diagnosa:ntext',
            'catatan:ntext',
            'daftar_id',
        ],
    ]) ?>

</div>

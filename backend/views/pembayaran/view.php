<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\pembayaran $model */

$this->title = $model->pembayaran_id;
$this->params['breadcrumbs'][] = ['label' => 'Pembayarans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pembayaran-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Edit', ['update', 'pembayaran_id' => $model->pembayaran_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'pembayaran_id' => $model->pembayaran_id], [
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
            'pembayaran_id',
            'biaya_periksa',
            'total',
            'resep_id',
            'periksa_id',
        ],
    ]) ?>

</div>

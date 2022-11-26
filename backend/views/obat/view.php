<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\obat $model */

$this->title = $model->obat_nama;
$this->params['breadcrumbs'][] = ['label' => 'Obats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="obat-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Edit', ['update', 'id_obat' => $model->id_obat], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'id_obat' => $model->id_obat], [
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
            'id_obat',
            'obat_nama',
            'harga',
            'stok',
            'satuan',
            'produksi',
        ],
    ]) ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\poliklinik $model */

$this->title = $model->poliklinik_nama;
$this->params['breadcrumbs'][] = ['label' => 'Polikliniks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="poliklinik-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Edit', ['update', 'poliklinik_id' => $model->poliklinik_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'poliklinik_id' => $model->poliklinik_id], [
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
            'poliklinik_id',
            'poliklinik_nama',
            'keterangan:ntext',
        ],
    ]) ?>

</div>

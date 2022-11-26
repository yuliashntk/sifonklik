<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\pasien $model */

$this->title = $model->pasien_nama;
$this->params['breadcrumbs'][] = ['label' => 'Pasiens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pasien-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Edit', ['update', 'pasien_id' => $model->pasien_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'pasien_id' => $model->pasien_id], [
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
            'pasien_id',
            'pasien_nama',
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

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var backend\models\admin $model */

$this->title = $model->admin_nama;
$this->params['breadcrumbs'][] = ['label' => 'Admin', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="admin-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Edit', ['update', 'admin_id' => $model->admin_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Hapus', ['delete', 'admin_id' => $model->admin_id], [
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
            'admin_id',
            'admin_nama',
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

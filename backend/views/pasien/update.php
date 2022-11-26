<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\pasien $model */

$this->title = 'Edit Pasien: ' . $model->pasien_nama;
$this->params['breadcrumbs'][] = ['label' => 'Pasiens', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pasien_id, 'url' => ['view', 'pasien_id' => $model->pasien_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pasien-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

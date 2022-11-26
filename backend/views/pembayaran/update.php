<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\pembayaran $model */

$this->title = 'Update Pembayaran: ' . $model->pembayaran_id;
$this->params['breadcrumbs'][] = ['label' => 'Pembayarans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pembayaran_id, 'url' => ['view', 'pembayaran_id' => $model->pembayaran_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pembayaran-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

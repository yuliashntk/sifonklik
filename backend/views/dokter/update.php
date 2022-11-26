<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\dokter $model */

$this->title = 'Update Dokter: ' . $model->dokter_nama;
$this->params['breadcrumbs'][] = ['label' => 'Dokters', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->dokter_id, 'url' => ['view', 'dokter_id' => $model->dokter_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dokter-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

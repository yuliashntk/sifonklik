<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\periksa $model */

$this->title = 'Update Periksa: ' . $model->periksa_id;
$this->params['breadcrumbs'][] = ['label' => 'Periksas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->periksa_id, 'url' => ['view', 'periksa_id' => $model->periksa_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="periksa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

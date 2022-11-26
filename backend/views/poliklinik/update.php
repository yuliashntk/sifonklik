<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\poliklinik $model */

$this->title = 'Update Poliklinik: ' . $model->poliklinik_id;
$this->params['breadcrumbs'][] = ['label' => 'Polikliniks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->poliklinik_id, 'url' => ['view', 'poliklinik_id' => $model->poliklinik_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="poliklinik-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

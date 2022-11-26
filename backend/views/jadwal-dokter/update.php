<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\jadwaldokter $model */

$this->title = 'Update Jadwaldokter: ' . $model->jadwal_id;
$this->params['breadcrumbs'][] = ['label' => 'Jadwaldokters', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->jadwal_id, 'url' => ['view', 'jadwal_id' => $model->jadwal_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jadwaldokter-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

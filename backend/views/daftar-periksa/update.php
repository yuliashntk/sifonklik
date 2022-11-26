<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\daftarperiksa $model */

$this->title = 'Update Daftarperiksa: ' . $model->daftar_id;
$this->params['breadcrumbs'][] = ['label' => 'Daftarperiksas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->daftar_id, 'url' => ['view', 'daftar_id' => $model->daftar_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="daftarperiksa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

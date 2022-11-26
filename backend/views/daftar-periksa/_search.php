<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\DaftarPeriksaSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="daftarperiksa-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'daftar_id') ?>

    <?= $form->field($model, 'pasien_id') ?>

    <?= $form->field($model, 'dokter_id') ?>

    <?= $form->field($model, 'tanggal') ?>

    <?= $form->field($model, 'keluhan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

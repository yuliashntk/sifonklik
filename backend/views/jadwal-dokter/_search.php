<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\JadwalDokterSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="jadwaldokter-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'jadwal_id') ?>

    <?= $form->field($model, 'waktu_mulai') ?>

    <?= $form->field($model, 'waktu_selesai') ?>

    <?= $form->field($model, 'dokter_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

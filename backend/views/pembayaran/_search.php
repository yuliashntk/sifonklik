<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\PembayaranSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pembayaran-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'pembayaran_id') ?>

    <?= $form->field($model, 'biaya_periksa') ?>

    <?= $form->field($model, 'total') ?>

    <?= $form->field($model, 'resep_id') ?>

    <?= $form->field($model, 'periksa_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\ResepSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="resep-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'resep_id') ?>

    <?= $form->field($model, 'total_harga') ?>

    <?= $form->field($model, 'obat_id') ?>

    <?= $form->field($model, 'periksa_id') ?>

    <?= $form->field($model, 'aturan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

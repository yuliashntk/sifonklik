<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var backend\models\poliklinik $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="poliklinik-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'poliklinik_nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

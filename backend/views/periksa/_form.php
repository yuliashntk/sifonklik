<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;
use backend\models\Pasien;
use backend\models\Dokter;
use backend\models\Tindakan;

$ar_pasien = ArrayHelper::map(Pasien::find()->asArray()->all(),'pasien_id','pasien_nama');
$ar_dokter = ArrayHelper::map(Dokter::find()->asArray()->all(),'dokter_id','dokter_nama');
$ar_tindakan = ArrayHelper::map(Tindakan::find()->asArray()->all(),'tindakan_id','tindakan_nama');


/** @var yii\web\View $this */
/** @var backend\models\periksa $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="periksa-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php //$form->field($model, 'pasien_id')->textInput() ?>
    <?php echo $form->field($model, 'pasien_id')->dropDownList(
                $ar_pasien, 
                ['prompt'=>'Pilih Pasien']); ?>

    <?php // $form->field($model, 'dokter_id')->textInput() ?>
    <?php echo $form->field($model, 'dokter_id')->dropDownList(
                $ar_dokter, 
                ['prompt'=>'Pilih dokter']); ?>

    <?php //$form->field($model, 'tindakan_id')->textInput() ?>
    <?php echo $form->field($model, 'tindakan_id')->dropDownList(
                $ar_tindakan, 
                ['prompt'=>'Pilih Tindakan']); ?>

    <?= $form->field($model, 'daftar_id')->textInput() ?>

    <?= $form->field($model, 'bb')->textInput() ?>

    <?= $form->field($model, 'tb')->textInput() ?>

    <?= $form->field($model, 'goldar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'diagnosa')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'catatan')->textarea(['rows' => 6]) ?>

    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;
use backend\models\Pasien;
use backend\models\Dokter;

$ar_pasien = ArrayHelper::map(Pasien::find()->asArray()->all(),'pasien_id','pasien_nama');
$ar_dokter = ArrayHelper::map(Dokter::find()->asArray()->all(),'dokter_id','dokter_nama');
/** @var yii\web\View $this */
/** @var backend\models\daftarperiksa $model */
/** @var yii\widgets\ActiveForm $form */
?>
 
 

<div class="daftarperiksa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php //$form->field($model, 'pasien_id')->textInput() ?>
    <?php echo $form->field($model, 'pasien_id')->dropDownList(
                $ar_pasien, 
                ['prompt'=>'Pilih Pasien']); ?>

    <?php // $form->field($model, 'dokter_id')->textInput() ?>
    <?php echo $form->field($model, 'dokter_id')->dropDownList(
                $ar_dokter, 
                ['prompt'=>'Pilih dokter']); ?>

<?=  $form->field($model, 'tanggal')->textInput(['type' => 'date']); ?>

    <?= $form->field($model, 'keluhan')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

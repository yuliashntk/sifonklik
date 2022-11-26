<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;
use backend\models\Dokter;

$ar_dokter = ArrayHelper::map(Dokter::find()->asArray()->all(),'dokter_id','dokter_nama');
/** @var yii\web\View $this */
/** @var backend\models\jadwaldokter $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="jadwaldokter-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'waktu_mulai')->textInput() ?>

    <?= $form->field($model, 'waktu_selesai')->textInput() ?>

    <?php // $form->field($model, 'dokter_id')->textInput() ?>
    <?php echo $form->field($model, 'dokter_id')->dropDownList(
                $ar_dokter, 
                ['prompt'=>'Pilih dokter']); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

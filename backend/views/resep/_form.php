<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;
use backend\models\Obat;

$ar_obat = ArrayHelper::map(Obat::find()->asArray()->all(),'id_obat','obat_nama');

/** @var yii\web\View $this */
/** @var backend\models\resep $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="resep-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'total_harga')->textInput(['maxlength' => true]) ?>

    <?php // $form->field($model, 'obat_id')->textInput() ?>
    <?php echo $form->field($model, 'obat_id')->dropDownList(
                $ar_obat, 
                ['prompt'=>'Pilih Obat']); ?>

    <?= $form->field($model, 'periksa_id')->textInput() ?>

    <?= $form->field($model, 'aturan')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

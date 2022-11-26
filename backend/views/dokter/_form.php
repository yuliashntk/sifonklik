<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\ArrayHelper;
use backend\models\Poliklinik;


$ar_poliklinik = ArrayHelper::map(Poliklinik::find()->asArray()->all(),'poliklinik_id','poliklinik_nama'); //ambil data poliklinik

/** @var yii\web\View $this */
/** @var backend\models\dokter $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="dokter-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'dokter_nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_hp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'agama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tempat_lahir')->textInput(['maxlength' => true]) ?>

    <?=  $form->field($model, 'tanggal_lahir')->textInput(['type' => 'date']); ?>
    

    <?= $form->field($model, 'no_praktek')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'poliklinik_id')->dropDownList(
                $ar_poliklinik, 
                ['prompt'=>'Pilih Poliklinik']); ?>
    <?php //$form->field($model, 'poliklinik_id')->textInput() ?> 

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

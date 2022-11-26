<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\daftarperiksa $model */

$this->title = 'Tambah Daftar Periksa';
$this->params['breadcrumbs'][] = ['label' => 'Daftarperiksas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="daftarperiksa-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

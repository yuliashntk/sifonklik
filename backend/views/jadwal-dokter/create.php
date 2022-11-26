<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\jadwaldokter $model */

$this->title = 'Tambah Jadwal Dokter';
$this->params['breadcrumbs'][] = ['label' => 'Jadwaldokters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jadwaldokter-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

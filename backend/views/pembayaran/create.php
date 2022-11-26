<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\pembayaran $model */

$this->title = 'Tambah Pembayaran';
$this->params['breadcrumbs'][] = ['label' => 'Pembayarans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pembayaran-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

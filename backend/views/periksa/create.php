<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\periksa $model */

$this->title = 'Tambah Periksa';
$this->params['breadcrumbs'][] = ['label' => 'Periksas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="periksa-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var backend\models\admin $model */

$this->title = 'Edit Admin: ' . $model->admin_nama;
$this->params['breadcrumbs'][] = ['label' => 'Admin', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->admin_id, 'url' => ['view', 'admin_id' => $model->admin_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="admin-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

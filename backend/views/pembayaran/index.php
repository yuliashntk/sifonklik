<?php

use backend\models\pembayaran;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\PembayaranSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Pembayaran';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pembayaran-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Pembayaran', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pembayaran_id',
            'biaya_periksa',
            'total',
            'resep_id',
            'periksa_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, pembayaran $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'pembayaran_id' => $model->pembayaran_id]);
                 }
            ],
        ],
    ]); ?>


</div>

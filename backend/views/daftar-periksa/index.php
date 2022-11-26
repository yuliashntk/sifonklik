<?php

use backend\models\daftarperiksa;
use backend\models\dokter;
use backend\models\pasien;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\DaftarPeriksaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Daftar Periksa';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="daftarperiksa-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Daftar Periksa', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'daftar_id',
            [
                'attribute'=>'pasien_id',
                'value'=>'pasien.pasien_nama',
                'filter'=>ArrayHelper::map(Pasien::find()->all(),'pasien_id','pasien_nama'),
               ],
            [
                'attribute'=>'dokter_id',
                'value'=>'dokter.dokter_nama',
                'filter'=>ArrayHelper::map(Dokter::find()->all(),'dokter_id','dokter_nama'),
               ],
            'tanggal',
            'keluhan:ntext',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, daftarperiksa $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'daftar_id' => $model->daftar_id]);
                 }
            ],
        ],
    ]); ?>


</div>

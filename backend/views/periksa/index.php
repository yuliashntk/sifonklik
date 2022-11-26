<?php

use backend\models\periksa;
use backend\models\dokter;
use backend\models\pasien;
use backend\models\tindakan;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\PeriksaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Periksa';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="periksa-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Periksa', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          //  'periksa_id',
          [
            'attribute'=>'dokter_id',
            'value'=>'dokter.dokter_nama',
            'filter'=>ArrayHelper::map(Dokter::find()->all(),'dokter_id','dokter_nama'),
           ],
           [
            'attribute'=>'pasien_id',
            'value'=>'pasien.pasien_nama',
            'filter'=>ArrayHelper::map(Pasien::find()->all(),'pasien_id','pasien_nama'),
           ],
            [
                'attribute'=>'tindakan_id',
                'value'=>'tindakan.tindakan_nama',
                'filter'=>ArrayHelper::map(Tindakan::find()->all(),'tindakan_id','tindakan_nama'),
               ],
            'bb',
            'tb',
            'goldar',
            'diagnosa:ntext',
            //'catatan:ntext',
            //'daftar_id',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, periksa $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'periksa_id' => $model->periksa_id]);
                 }
            ],
        ],
    ]); ?>


</div>

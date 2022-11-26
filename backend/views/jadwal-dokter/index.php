<?php

use backend\models\jadwaldokter;
use backend\models\dokter;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\JadwalDokterSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Jadwal Dokter';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jadwaldokter-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Jadwal Dokter', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'jadwal_id',
            'waktu_mulai',
            'waktu_selesai',
            [
                'attribute'=>'dokter_id',
                'value'=>'dokter.dokter_nama',
                'filter'=>ArrayHelper::map(Dokter::find()->all(),'dokter_id','dokter_nama'),
            ],
            [ 
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, jadwaldokter $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'jadwal_id' => $model->jadwal_id]);
                 }
            ],
        ],
    ]); ?>


</div>

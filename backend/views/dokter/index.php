<?php

use backend\models\dokter;
use backend\models\poliklinik;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\DokterSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Dokter';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dokter-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Dokter', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

          //  'dokter_id',
            'dokter_nama',
            'email:email',
           // 'username',
           // 'password',
            //'no_hp',
            //'alamat',
            //'agama',
            //'tempat_lahir',
            //'tanggal_lahir',
            'no_praktek',
           [
            'attribute'=>'poliklinik_id',
            'value'=>'poliklinik.poliklinik_nama',
            'filter'=>ArrayHelper::map(Poliklinik::find()->all(),'poliklinik_id','poliklinik_nama'),
           ],

            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, dokter $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'dokter_id' => $model->dokter_id]);
                 }
            ],
        ],
    ]); ?>


</div>

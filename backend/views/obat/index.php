<?php

use backend\models\obat;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\ObatSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Obat';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="obat-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Obat', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

        //    'id_obat',
            'obat_nama',
            'harga',
            'stok',
            'satuan',
            'produksi',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, obat $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_obat' => $model->id_obat]);
                 }
            ],
        ],
    ]); ?>


</div>

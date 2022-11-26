<?php

use backend\models\poliklinik;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\PoliklinikSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Poliklinik';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="poliklinik-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Poliklinik', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

        //    'poliklinik_id',
            'poliklinik_nama',
            'keterangan:ntext',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, poliklinik $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'poliklinik_id' => $model->poliklinik_id]);
                 }
            ],
        ],
    ]); ?>


</div>

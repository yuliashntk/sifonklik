<?php

use backend\models\tindakan;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\TindakanSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Tindakan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tindakan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Tindakan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'tindakan_id',
            'tindakan_nama',
            'harga',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, tindakan $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'tindakan_id' => $model->tindakan_id]);
                 }
            ],
        ],
    ]); ?>


</div>

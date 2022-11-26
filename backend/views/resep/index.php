<?php

use backend\models\resep;
use backend\models\obat;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\ResepSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Resep';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resep-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Resep', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'resep_id',
            'total_harga',
            [
                'attribute'=>'obat_id',
                'value'=>'obat.obat_nama',
                'filter'=>ArrayHelper::map(Obat::find()->all(),'id_obat','obat_nama'),
               ],
    
            'periksa_id',
            'aturan',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, resep $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'resep_id' => $model->resep_id]);
                 }
            ],
        ],
    ]); ?>


</div>

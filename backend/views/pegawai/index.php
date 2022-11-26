<?php

use backend\models\pegawai;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\PegawaiSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Pegawai';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pegawai-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Pegawai', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

       //     'pegawai_id',
            'pegawai_nama',
            'email:email',
       //     'username',
       //     'password',
            //'no_hp',
            //'alamat',
            //'agama',
            //'tempat_lahir',
            //'tanggal_lahir',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, pegawai $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'pegawai_id' => $model->pegawai_id]);
                 }
            ],
        ],
    ]); ?>


</div>

<?php

use backend\models\admin;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\AdminSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Admin';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Tambah Admin', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

        //    'admin_id',
            'admin_nama',
            'email:email',
        //    'username',
         //   'password',
            //'no_hp',
            //'alamat',
            //'agama',
            //'tempat_lahir',
            //'tanggal_lahir',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, admin $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'admin_id' => $model->admin_id]);
                 }
            ],
        ],
    ]); ?>


</div>

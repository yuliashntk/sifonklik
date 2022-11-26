<?php

namespace backend\controllers;

use backend\models\pembayaran;
use backend\models\PembayaranSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PembayaranController implements the CRUD actions for pembayaran model.
 */
class PembayaranController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all pembayaran models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PembayaranSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single pembayaran model.
     * @param int $pembayaran_id Pembayaran ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($pembayaran_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($pembayaran_id),
        ]);
    }

    /**
     * Creates a new pembayaran model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new pembayaran();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'pembayaran_id' => $model->pembayaran_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing pembayaran model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $pembayaran_id Pembayaran ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($pembayaran_id)
    {
        $model = $this->findModel($pembayaran_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'pembayaran_id' => $model->pembayaran_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing pembayaran model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $pembayaran_id Pembayaran ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($pembayaran_id)
    {
        $this->findModel($pembayaran_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the pembayaran model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $pembayaran_id Pembayaran ID
     * @return pembayaran the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($pembayaran_id)
    {
        if (($model = pembayaran::findOne(['pembayaran_id' => $pembayaran_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

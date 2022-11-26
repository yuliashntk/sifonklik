<?php

namespace backend\controllers;

use backend\models\dokter;
use backend\models\DokterSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DokterController implements the CRUD actions for dokter model.
 */
class DokterController extends Controller
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
     * Lists all dokter models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new DokterSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single dokter model.
     * @param int $dokter_id Dokter ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($dokter_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($dokter_id),
        ]);
    }

    /**
     * Creates a new dokter model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new dokter();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['index', 'dokter_id' => $model->dokter_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing dokter model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $dokter_id Dokter ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($dokter_id)
    {
        $model = $this->findModel($dokter_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'dokter_id' => $model->dokter_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing dokter model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $dokter_id Dokter ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($dokter_id)
    {
        $this->findModel($dokter_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the dokter model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $dokter_id Dokter ID
     * @return dokter the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($dokter_id)
    {
        if (($model = dokter::findOne(['dokter_id' => $dokter_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

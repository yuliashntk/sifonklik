<?php

namespace backend\controllers;

use backend\models\pasien;
use backend\models\PasienSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PasienController implements the CRUD actions for pasien model.
 */
class PasienController extends Controller
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
     * Lists all pasien models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PasienSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single pasien model.
     * @param int $pasien_id Pasien ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($pasien_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($pasien_id),
        ]);
    }

    /**
     * Creates a new pasien model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new pasien();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'pasien_id' => $model->pasien_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing pasien model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $pasien_id Pasien ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($pasien_id)
    {
        $model = $this->findModel($pasien_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['index', 'pasien_id' => $model->pasien_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing pasien model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $pasien_id Pasien ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($pasien_id)
    {
        $this->findModel($pasien_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the pasien model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $pasien_id Pasien ID
     * @return pasien the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($pasien_id)
    {
        if (($model = pasien::findOne(['pasien_id' => $pasien_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

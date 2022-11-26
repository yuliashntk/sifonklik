<?php

namespace backend\controllers;

use backend\models\tindakan;
use backend\models\TindakanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TindakanController implements the CRUD actions for tindakan model.
 */
class TindakanController extends Controller
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
     * Lists all tindakan models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TindakanSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single tindakan model.
     * @param int $tindakan_id Tindakan ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($tindakan_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($tindakan_id),
        ]);
    }

    /**
     * Creates a new tindakan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new tindakan();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['index', 'tindakan_id' => $model->tindakan_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing tindakan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $tindakan_id Tindakan ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($tindakan_id)
    {
        $model = $this->findModel($tindakan_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'tindakan_id' => $model->tindakan_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing tindakan model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $tindakan_id Tindakan ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($tindakan_id)
    {
        $this->findModel($tindakan_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the tindakan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $tindakan_id Tindakan ID
     * @return tindakan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($tindakan_id)
    {
        if (($model = tindakan::findOne(['tindakan_id' => $tindakan_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

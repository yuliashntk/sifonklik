<?php

namespace backend\controllers;

use backend\models\periksa;
use app\models\PeriksaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PeriksaController implements the CRUD actions for periksa model.
 */
class PeriksaController extends Controller
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
     * Lists all periksa models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PeriksaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single periksa model.
     * @param int $periksa_id Periksa ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($periksa_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($periksa_id),
        ]);
    }

    /**
     * Creates a new periksa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new periksa();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'periksa_id' => $model->periksa_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing periksa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $periksa_id Periksa ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($periksa_id)
    {
        $model = $this->findModel($periksa_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'periksa_id' => $model->periksa_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing periksa model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $periksa_id Periksa ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($periksa_id)
    {
        $this->findModel($periksa_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the periksa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $periksa_id Periksa ID
     * @return periksa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($periksa_id)
    {
        if (($model = periksa::findOne(['periksa_id' => $periksa_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

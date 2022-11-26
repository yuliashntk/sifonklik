<?php

namespace backend\controllers;

use backend\models\poliklinik;
use backend\models\PoliklinikSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PoliklinikController implements the CRUD actions for poliklinik model.
 */
class PoliklinikController extends Controller
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
     * Lists all poliklinik models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PoliklinikSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single poliklinik model.
     * @param int $poliklinik_id Poliklinik ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($poliklinik_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($poliklinik_id),
        ]);
    }

    /**
     * Creates a new poliklinik model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new poliklinik();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['index', 'poliklinik_id' => $model->poliklinik_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing poliklinik model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $poliklinik_id Poliklinik ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($poliklinik_id)
    {
        $model = $this->findModel($poliklinik_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'poliklinik_id' => $model->poliklinik_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing poliklinik model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $poliklinik_id Poliklinik ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($poliklinik_id)
    {
        $this->findModel($poliklinik_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the poliklinik model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $poliklinik_id Poliklinik ID
     * @return poliklinik the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($poliklinik_id)
    {
        if (($model = poliklinik::findOne(['poliklinik_id' => $poliklinik_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

<?php

namespace backend\controllers;

use backend\models\jadwaldokter;
use backend\models\JadwalDokterSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * JadwalDokterController implements the CRUD actions for jadwaldokter model.
 */
class JadwalDokterController extends Controller
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
     * Lists all jadwaldokter models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new JadwalDokterSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single jadwaldokter model.
     * @param int $jadwal_id Jadwal ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($jadwal_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($jadwal_id),
        ]);
    }

    /**
     * Creates a new jadwaldokter model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new jadwaldokter();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'jadwal_id' => $model->jadwal_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing jadwaldokter model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $jadwal_id Jadwal ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($jadwal_id)
    {
        $model = $this->findModel($jadwal_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'jadwal_id' => $model->jadwal_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing jadwaldokter model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $jadwal_id Jadwal ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($jadwal_id)
    {
        $this->findModel($jadwal_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the jadwaldokter model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $jadwal_id Jadwal ID
     * @return jadwaldokter the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($jadwal_id)
    {
        if (($model = jadwaldokter::findOne(['jadwal_id' => $jadwal_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

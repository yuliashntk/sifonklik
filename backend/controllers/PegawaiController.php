<?php

namespace backend\controllers;

use backend\models\pegawai;
use backend\models\PegawaiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PegawaiController implements the CRUD actions for pegawai model.
 */
class PegawaiController extends Controller
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
     * Lists all pegawai models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PegawaiSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single pegawai model.
     * @param int $pegawai_id Pegawai ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($pegawai_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($pegawai_id),
        ]);
    }

    /**
     * Creates a new pegawai model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new pegawai();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['index', 'pegawai_id' => $model->pegawai_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing pegawai model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $pegawai_id Pegawai ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($pegawai_id)
    {
        $model = $this->findModel($pegawai_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'pegawai_id' => $model->pegawai_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing pegawai model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $pegawai_id Pegawai ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($pegawai_id)
    {
        $this->findModel($pegawai_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the pegawai model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $pegawai_id Pegawai ID
     * @return pegawai the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($pegawai_id)
    {
        if (($model = pegawai::findOne(['pegawai_id' => $pegawai_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

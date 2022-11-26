<?php

namespace backend\controllers;

use backend\models\daftarperiksa;
use backend\models\DaftarPeriksaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DaftarPeriksaController implements the CRUD actions for daftarperiksa model.
 */
class DaftarPeriksaController extends Controller
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
     * Lists all daftarperiksa models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new DaftarPeriksaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single daftarperiksa model.
     * @param int $daftar_id Daftar ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($daftar_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($daftar_id),
        ]);
    }

    /**
     * Creates a new daftarperiksa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new daftarperiksa();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'daftar_id' => $model->daftar_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing daftarperiksa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $daftar_id Daftar ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($daftar_id)
    {
        $model = $this->findModel($daftar_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'daftar_id' => $model->daftar_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing daftarperiksa model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $daftar_id Daftar ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($daftar_id)
    {
        $this->findModel($daftar_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the daftarperiksa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $daftar_id Daftar ID
     * @return daftarperiksa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($daftar_id)
    {
        if (($model = daftarperiksa::findOne(['daftar_id' => $daftar_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

<?php

namespace backend\controllers;

use backend\models\admin;
use backend\models\AdminSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AdminController implements the CRUD actions for admin model.
 */
class AdminController extends Controller
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
     * Lists all admin models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AdminSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single admin model.
     * @param int $admin_id Admin ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($admin_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($admin_id),
        ]);
    }

    /**
     * Creates a new admin model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new admin();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['index', 'admin_id' => $model->admin_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing admin model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $admin_id Admin ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($admin_id)
    {
        $model = $this->findModel($admin_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'admin_id' => $model->admin_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing admin model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $admin_id Admin ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($admin_id)
    {
        $this->findModel($admin_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the admin model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $admin_id Admin ID
     * @return admin the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($admin_id)
    {
        if (($model = admin::findOne(['admin_id' => $admin_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}

<?php

namespace app\controllers;

use Yii;
use app\models\Interviene;
use app\models\IntervieneSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * IntervieneController implements the CRUD actions for Interviene model.
 */
class IntervieneController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Interviene models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new IntervieneSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Interviene model.
     * @param integer $id_caso
     * @param integer $id_empleado_profesional
     * @return mixed
     */
    public function actionView($id_caso, $id_empleado_profesional)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_caso, $id_empleado_profesional),
        ]);
    }

    /**
     * Creates a new Interviene model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Interviene();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_caso' => $model->id_caso, 'id_empleado_profesional' => $model->id_empleado_profesional]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Interviene model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_caso
     * @param integer $id_empleado_profesional
     * @return mixed
     */
    public function actionUpdate($id_caso, $id_empleado_profesional)
    {
        $model = $this->findModel($id_caso, $id_empleado_profesional);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_caso' => $model->id_caso, 'id_empleado_profesional' => $model->id_empleado_profesional]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Interviene model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_caso
     * @param integer $id_empleado_profesional
     * @return mixed
     */
    public function actionDelete($id_caso, $id_empleado_profesional)
    {
        $this->findModel($id_caso, $id_empleado_profesional)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Interviene model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_caso
     * @param integer $id_empleado_profesional
     * @return Interviene the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_caso, $id_empleado_profesional)
    {
        if (($model = Interviene::findOne(['id_caso' => $id_caso, 'id_empleado_profesional' => $id_empleado_profesional])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

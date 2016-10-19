<?php

namespace app\controllers;

use Yii;
use app\models\Atiende;
use app\models\AtiendeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AtiendeController implements the CRUD actions for Atiende model.
 */
class AtiendeController extends Controller
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
     * Lists all Atiende models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AtiendeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Atiende model.
     * @param integer $id_empleado_operador
     * @param integer $id_caso
     * @return mixed
     */
    public function actionView($id_empleado_operador, $id_caso)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_empleado_operador, $id_caso),
        ]);
    }

    /**
     * Creates a new Atiende model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Atiende();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_empleado_operador' => $model->id_empleado_operador, 'id_caso' => $model->id_caso]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Atiende model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_empleado_operador
     * @param integer $id_caso
     * @return mixed
     */
    public function actionUpdate($id_empleado_operador, $id_caso)
    {
        $model = $this->findModel($id_empleado_operador, $id_caso);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_empleado_operador' => $model->id_empleado_operador, 'id_caso' => $model->id_caso]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Atiende model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_empleado_operador
     * @param integer $id_caso
     * @return mixed
     */
    public function actionDelete($id_empleado_operador, $id_caso)
    {
        $this->findModel($id_empleado_operador, $id_caso)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Atiende model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_empleado_operador
     * @param integer $id_caso
     * @return Atiende the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_empleado_operador, $id_caso)
    {
        if (($model = Atiende::findOne(['id_empleado_operador' => $id_empleado_operador, 'id_caso' => $id_caso])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

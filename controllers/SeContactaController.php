<?php

namespace app\controllers;

use Yii;
use app\models\SeContacta;
use app\models\SeContactaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SeContactaController implements the CRUD actions for SeContacta model.
 */
class SeContactaController extends Controller
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
     * Lists all SeContacta models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SeContactaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SeContacta model.
     * @param integer $id_empleado_operador
     * @param integer $id_centro_asistencial
     * @param string $fecha
     * @param string $hora
     * @return mixed
     */
    public function actionView($id_empleado_operador, $id_centro_asistencial, $fecha, $hora)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_empleado_operador, $id_centro_asistencial, $fecha, $hora),
        ]);
    }

    /**
     * Creates a new SeContacta model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SeContacta();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_empleado_operador' => $model->id_empleado_operador, 'id_centro_asistencial' => $model->id_centro_asistencial, 'fecha' => $model->fecha, 'hora' => $model->hora]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing SeContacta model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_empleado_operador
     * @param integer $id_centro_asistencial
     * @param string $fecha
     * @param string $hora
     * @return mixed
     */
    public function actionUpdate($id_empleado_operador, $id_centro_asistencial, $fecha, $hora)
    {
        $model = $this->findModel($id_empleado_operador, $id_centro_asistencial, $fecha, $hora);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_empleado_operador' => $model->id_empleado_operador, 'id_centro_asistencial' => $model->id_centro_asistencial, 'fecha' => $model->fecha, 'hora' => $model->hora]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SeContacta model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_empleado_operador
     * @param integer $id_centro_asistencial
     * @param string $fecha
     * @param string $hora
     * @return mixed
     */
    public function actionDelete($id_empleado_operador, $id_centro_asistencial, $fecha, $hora)
    {
        $this->findModel($id_empleado_operador, $id_centro_asistencial, $fecha, $hora)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SeContacta model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_empleado_operador
     * @param integer $id_centro_asistencial
     * @param string $fecha
     * @param string $hora
     * @return SeContacta the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_empleado_operador, $id_centro_asistencial, $fecha, $hora)
    {
        if (($model = SeContacta::findOne(['id_empleado_operador' => $id_empleado_operador, 'id_centro_asistencial' => $id_centro_asistencial, 'fecha' => $fecha, 'hora' => $hora])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

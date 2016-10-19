<?php

namespace app\controllers;

use Yii;
use app\models\Asiste;
use app\models\AsisteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AsisteController implements the CRUD actions for Asiste model.
 */
class AsisteController extends Controller
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
     * Lists all Asiste models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AsisteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Asiste model.
     * @param integer $id_persona_victima
     * @param integer $id_empleado_operador
     * @param string $fecha
     * @param string $hora
     * @return mixed
     */
    public function actionView($id_persona_victima, $id_empleado_operador, $fecha, $hora)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_persona_victima, $id_empleado_operador, $fecha, $hora),
        ]);
    }

    /**
     * Creates a new Asiste model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Asiste();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_persona_victima' => $model->id_persona_victima, 'id_empleado_operador' => $model->id_empleado_operador, 'fecha' => $model->fecha, 'hora' => $model->hora]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Asiste model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_persona_victima
     * @param integer $id_empleado_operador
     * @param string $fecha
     * @param string $hora
     * @return mixed
     */
    public function actionUpdate($id_persona_victima, $id_empleado_operador, $fecha, $hora)
    {
        $model = $this->findModel($id_persona_victima, $id_empleado_operador, $fecha, $hora);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_persona_victima' => $model->id_persona_victima, 'id_empleado_operador' => $model->id_empleado_operador, 'fecha' => $model->fecha, 'hora' => $model->hora]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Asiste model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_persona_victima
     * @param integer $id_empleado_operador
     * @param string $fecha
     * @param string $hora
     * @return mixed
     */
    public function actionDelete($id_persona_victima, $id_empleado_operador, $fecha, $hora)
    {
        $this->findModel($id_persona_victima, $id_empleado_operador, $fecha, $hora)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Asiste model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_persona_victima
     * @param integer $id_empleado_operador
     * @param string $fecha
     * @param string $hora
     * @return Asiste the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_persona_victima, $id_empleado_operador, $fecha, $hora)
    {
        if (($model = Asiste::findOne(['id_persona_victima' => $id_persona_victima, 'id_empleado_operador' => $id_empleado_operador, 'fecha' => $fecha, 'hora' => $hora])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

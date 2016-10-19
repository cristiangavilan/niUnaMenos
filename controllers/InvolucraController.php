<?php

namespace app\controllers;

use Yii;
use app\models\Involucra;
use app\models\InvolucraSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * InvolucraController implements the CRUD actions for Involucra model.
 */
class InvolucraController extends Controller
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
     * Lists all Involucra models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InvolucraSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Involucra model.
     * @param integer $id_persona_victima
     * @param integer $id_caso
     * @return mixed
     */
    public function actionView($id_persona_victima, $id_caso)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_persona_victima, $id_caso),
        ]);
    }

    /**
     * Creates a new Involucra model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Involucra();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_persona_victima' => $model->id_persona_victima, 'id_caso' => $model->id_caso]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Involucra model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_persona_victima
     * @param integer $id_caso
     * @return mixed
     */
    public function actionUpdate($id_persona_victima, $id_caso)
    {
        $model = $this->findModel($id_persona_victima, $id_caso);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_persona_victima' => $model->id_persona_victima, 'id_caso' => $model->id_caso]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Involucra model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_persona_victima
     * @param integer $id_caso
     * @return mixed
     */
    public function actionDelete($id_persona_victima, $id_caso)
    {
        $this->findModel($id_persona_victima, $id_caso)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Involucra model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_persona_victima
     * @param integer $id_caso
     * @return Involucra the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_persona_victima, $id_caso)
    {
        if (($model = Involucra::findOne(['id_persona_victima' => $id_persona_victima, 'id_caso' => $id_caso])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

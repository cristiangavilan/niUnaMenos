<?php

namespace app\controllers;

use Yii;
use app\models\GeneradaPor;
use app\models\GeneradaPorSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GeneradaPorController implements the CRUD actions for GeneradaPor model.
 */
class GeneradaPorController extends Controller
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
     * Lists all GeneradaPor models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GeneradaPorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single GeneradaPor model.
     * @param integer $id_persona_agresor
     * @param integer $id_caso
     * @return mixed
     */
    public function actionView($id_persona_agresor, $id_caso)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_persona_agresor, $id_caso),
        ]);
    }

    /**
     * Creates a new GeneradaPor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new GeneradaPor();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_persona_agresor' => $model->id_persona_agresor, 'id_caso' => $model->id_caso]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing GeneradaPor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_persona_agresor
     * @param integer $id_caso
     * @return mixed
     */
    public function actionUpdate($id_persona_agresor, $id_caso)
    {
        $model = $this->findModel($id_persona_agresor, $id_caso);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_persona_agresor' => $model->id_persona_agresor, 'id_caso' => $model->id_caso]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing GeneradaPor model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_persona_agresor
     * @param integer $id_caso
     * @return mixed
     */
    public function actionDelete($id_persona_agresor, $id_caso)
    {
        $this->findModel($id_persona_agresor, $id_caso)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the GeneradaPor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_persona_agresor
     * @param integer $id_caso
     * @return GeneradaPor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_persona_agresor, $id_caso)
    {
        if (($model = GeneradaPor::findOne(['id_persona_agresor' => $id_persona_agresor, 'id_caso' => $id_caso])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

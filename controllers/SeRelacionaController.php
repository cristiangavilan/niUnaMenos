<?php

namespace app\controllers;

use Yii;
use app\models\SeRelaciona;
use app\models\SeRelacionaSaerch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SeRelacionaController implements the CRUD actions for SeRelaciona model.
 */
class SeRelacionaController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all SeRelaciona models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SeRelacionaSaerch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SeRelaciona model.
     * @param integer $id_persona1
     * @param integer $id_vinculo
     * @param integer $id_persona2
     * @return mixed
     */
    public function actionView($id_persona1, $id_vinculo, $id_persona2)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_persona1, $id_vinculo, $id_persona2),
        ]);
    }

    /**
     * Creates a new SeRelaciona model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SeRelaciona();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_persona1' => $model->id_persona1, 'id_vinculo' => $model->id_vinculo, 'id_persona2' => $model->id_persona2]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing SeRelaciona model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id_persona1
     * @param integer $id_vinculo
     * @param integer $id_persona2
     * @return mixed
     */
    public function actionUpdate($id_persona1, $id_vinculo, $id_persona2)
    {
        $model = $this->findModel($id_persona1, $id_vinculo, $id_persona2);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_persona1' => $model->id_persona1, 'id_vinculo' => $model->id_vinculo, 'id_persona2' => $model->id_persona2]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SeRelaciona model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id_persona1
     * @param integer $id_vinculo
     * @param integer $id_persona2
     * @return mixed
     */
    public function actionDelete($id_persona1, $id_vinculo, $id_persona2)
    {
        $this->findModel($id_persona1, $id_vinculo, $id_persona2)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SeRelaciona model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id_persona1
     * @param integer $id_vinculo
     * @param integer $id_persona2
     * @return SeRelaciona the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_persona1, $id_vinculo, $id_persona2)
    {
        if (($model = SeRelaciona::findOne(['id_persona1' => $id_persona1, 'id_vinculo' => $id_vinculo, 'id_persona2' => $id_persona2])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}

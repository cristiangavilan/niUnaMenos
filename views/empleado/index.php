<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EmpleadoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Empleados');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empleado-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Empleado'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_empleado',
            'id_estado',
            'id_tipo_documento',
            'numero_documento',
            'nombre',
            // 'apellido',
            // 'fecha_nacimiento',
            // 'telefono',
            // 'direccion',
            // 'email:email',
            // 'id_genero',
            // 'id_ciudad',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

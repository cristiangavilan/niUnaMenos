<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AlertaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Alertas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alerta-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Alerta'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_alerta',
            'fecha',
            'hora',
            'gps_lat',
            'gps_lng',
            // 'id_persona_victima',
            // 'id_tipo_alerta',
            // 'id_empleado_operador',
            // 'observacion',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

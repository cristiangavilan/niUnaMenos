<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CentroAsistencialSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Centro Asistencials');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="centro-asistencial-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Centro Asistencial'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_centro_asistencial',
            'nombre',
            'direccion',
            'telefono',
            'gps_lat',
            // 'gps_lng',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

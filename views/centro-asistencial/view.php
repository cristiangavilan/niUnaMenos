<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CentroAsistencial */

$this->title = $model->id_centro_asistencial;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Centro Asistencials'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="centro-asistencial-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id_centro_asistencial], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id_centro_asistencial], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_centro_asistencial',
            'nombre',
            'direccion',
            'telefono',
            'gps_lat',
            'gps_lng',
        ],
    ]) ?>

</div>

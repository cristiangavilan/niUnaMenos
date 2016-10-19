<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Alerta */

$this->title = $model->id_alerta;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Alertas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="alerta-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id_alerta], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id_alerta], [
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
            'id_alerta',
            'fecha',
            'hora',
            'gps_lat',
            'gps_lng',
            'id_persona_victima',
            'id_tipo_alerta',
            'id_empleado_operador',
            'observacion',
        ],
    ]) ?>

</div>

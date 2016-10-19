<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SeContacta */

$this->title = $model->id_empleado_operador;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Se Contactas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="se-contacta-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id_empleado_operador' => $model->id_empleado_operador, 'id_centro_asistencial' => $model->id_centro_asistencial, 'fecha' => $model->fecha, 'hora' => $model->hora], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id_empleado_operador' => $model->id_empleado_operador, 'id_centro_asistencial' => $model->id_centro_asistencial, 'fecha' => $model->fecha, 'hora' => $model->hora], [
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
            'id_empleado_operador',
            'id_centro_asistencial',
            'fecha',
            'hora',
            'descripcion',
        ],
    ]) ?>

</div>

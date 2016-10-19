<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Asiste */

$this->title = $model->id_persona_victima;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Asistes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asiste-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id_persona_victima' => $model->id_persona_victima, 'id_empleado_operador' => $model->id_empleado_operador, 'fecha' => $model->fecha, 'hora' => $model->hora], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id_persona_victima' => $model->id_persona_victima, 'id_empleado_operador' => $model->id_empleado_operador, 'fecha' => $model->fecha, 'hora' => $model->hora], [
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
            'id_persona_victima',
            'id_empleado_operador',
            'fecha',
            'hora',
            'descripcion',
        ],
    ]) ?>

</div>

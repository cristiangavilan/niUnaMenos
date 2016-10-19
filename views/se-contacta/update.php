<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SeContacta */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Se Contacta',
]) . $model->id_empleado_operador;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Se Contactas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_empleado_operador, 'url' => ['view', 'id_empleado_operador' => $model->id_empleado_operador, 'id_centro_asistencial' => $model->id_centro_asistencial, 'fecha' => $model->fecha, 'hora' => $model->hora]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="se-contacta-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

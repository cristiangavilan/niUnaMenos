<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Empleado */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Empleado',
]) . $model->id_empleado;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Empleados'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_empleado, 'url' => ['view', 'id' => $model->id_empleado]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="empleado-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Profesional */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Profesional',
]) . $model->id_empleado_profesional;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Profesionals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_empleado_profesional, 'url' => ['view', 'id' => $model->id_empleado_profesional]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="profesional-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

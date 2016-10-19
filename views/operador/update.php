<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Operador */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Operador',
]) . ' ' . $model->id_empleado_operador;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Operadors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_empleado_operador, 'url' => ['view', 'id' => $model->id_empleado_operador]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="operador-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

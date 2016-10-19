<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Atiende */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Atiende',
]) . $model->id_empleado_operador;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Atiendes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_empleado_operador, 'url' => ['view', 'id_empleado_operador' => $model->id_empleado_operador, 'id_caso' => $model->id_caso]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="atiende-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

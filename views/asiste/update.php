<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Asiste */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Asiste',
]) . $model->id_persona_victima;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Asistes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_persona_victima, 'url' => ['view', 'id_persona_victima' => $model->id_persona_victima, 'id_empleado_operador' => $model->id_empleado_operador, 'fecha' => $model->fecha, 'hora' => $model->hora]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="asiste-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Interviene */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Interviene',
]) . $model->id_caso;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Intervienes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_caso, 'url' => ['view', 'id_caso' => $model->id_caso, 'id_empleado_profesional' => $model->id_empleado_profesional]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="interviene-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

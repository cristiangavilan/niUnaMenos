<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GrupoDeAsistencia */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Grupo De Asistencia',
]) . $model->id_grupo_de_asistencia;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Grupo De Asistencias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_grupo_de_asistencia, 'url' => ['view', 'id' => $model->id_grupo_de_asistencia]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="grupo-de-asistencia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

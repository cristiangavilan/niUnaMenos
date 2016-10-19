<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CentroAsistencial */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Centro Asistencial',
]) . $model->id_centro_asistencial;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Centro Asistencials'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_centro_asistencial, 'url' => ['view', 'id' => $model->id_centro_asistencial]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="centro-asistencial-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

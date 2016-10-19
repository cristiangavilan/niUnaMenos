<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\GrupoDeAsistencia */

$this->title = Yii::t('app', 'Create Grupo De Asistencia');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Grupo De Asistencias'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grupo-de-asistencia-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

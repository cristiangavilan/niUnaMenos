<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TipoCentroAsistencial */

$this->title = Yii::t('app', 'Create Tipo Centro Asistencial');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tipo Centro Asistencials'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-centro-asistencial-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

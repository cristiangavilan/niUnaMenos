<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GeneradaPor */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Generada Por',
]) . $model->id_persona_agresor;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Generada Pors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_persona_agresor, 'url' => ['view', 'id_persona_agresor' => $model->id_persona_agresor, 'id_caso' => $model->id_caso]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="generada-por-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

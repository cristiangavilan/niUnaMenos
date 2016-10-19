<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Agresor */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Agresor',
]) . ' ' . $model->id_persona_agresor;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Agresors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_persona_agresor, 'url' => ['view', 'id' => $model->id_persona_agresor]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="agresor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

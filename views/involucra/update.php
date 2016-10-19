<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Involucra */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Involucra',
]) . $model->id_persona_victima;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Involucras'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_persona_victima, 'url' => ['view', 'id_persona_victima' => $model->id_persona_victima, 'id_caso' => $model->id_caso]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="involucra-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

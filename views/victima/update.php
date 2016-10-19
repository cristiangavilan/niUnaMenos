<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Victima */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Victima',
]) . ' ' . $model->id_victima;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Victimas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_victima, 'url' => ['view', 'id' => $model->id_victima]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="victima-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

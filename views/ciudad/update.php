<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ciudad */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Ciudad',
]) . ' ' . $model->id_ciudad;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ciudads'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_ciudad, 'url' => ['view', 'id' => $model->id_ciudad]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="ciudad-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Caso */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Caso',
]) . $model->id_caso;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Casos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_caso, 'url' => ['view', 'id' => $model->id_caso]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="caso-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Vinculo */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Vinculo',
]) . ' ' . $model->id_vinculo;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Vinculos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_vinculo, 'url' => ['view', 'id' => $model->id_vinculo]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="vinculo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

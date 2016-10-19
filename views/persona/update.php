<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Persona */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Persona',
]) . $model->id_persona;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Personas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_persona, 'url' => ['view', 'id' => $model->id_persona]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="persona-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SeRelaciona */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Se Relaciona',
]) . ' ' . $model->id_persona1;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Se Relacionas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_persona1, 'url' => ['view', 'id_persona1' => $model->id_persona1, 'id_vinculo' => $model->id_vinculo, 'id_persona2' => $model->id_persona2]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="se-relaciona-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

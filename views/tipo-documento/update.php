<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TipoDocumento */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Tipo Documento',
]) . ' ' . $model->id_tipo_documento;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tipo Documentos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tipo_documento, 'url' => ['view', 'id' => $model->id_tipo_documento]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="tipo-documento-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

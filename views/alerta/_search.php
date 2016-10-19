<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AlertaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="alerta-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_alerta') ?>

    <?= $form->field($model, 'fecha') ?>

    <?= $form->field($model, 'hora') ?>

    <?= $form->field($model, 'gps_lat') ?>

    <?= $form->field($model, 'gps_lng') ?>

    <?php // echo $form->field($model, 'id_persona_victima') ?>

    <?php // echo $form->field($model, 'id_tipo_alerta') ?>

    <?php // echo $form->field($model, 'id_empleado_operador') ?>

    <?php // echo $form->field($model, 'observacion') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

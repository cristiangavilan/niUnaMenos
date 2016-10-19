<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Alerta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="alerta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fecha')->textInput() ?>

    <?= $form->field($model, 'hora')->textInput() ?>

    <?= $form->field($model, 'gps_lat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gps_lng')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_persona_victima')->textInput() ?>

    <?= $form->field($model, 'id_tipo_alerta')->textInput() ?>

    <?= $form->field($model, 'id_empleado_operador')->textInput() ?>

    <?= $form->field($model, 'observacion')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

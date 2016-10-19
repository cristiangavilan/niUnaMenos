<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Profesional */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="profesional-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_empleado_profesional')->textInput() ?>

    <?= $form->field($model, 'profesion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_grupo_asistencia')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

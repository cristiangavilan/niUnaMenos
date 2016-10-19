<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Victima */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="victima-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_victima')->textInput() ?>

    <?= $form->field($model, 'id_estado')->textInput() ?>

    <?= $form->field($model, 'aspecto_relevante')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

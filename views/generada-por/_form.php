<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\GeneradaPor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="generada-por-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_persona_agresor')->textInput() ?>

    <?= $form->field($model, 'id_caso')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

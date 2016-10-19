<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datecontrol\Module;
use kartik\datecontrol\DateControl;
//use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Empleado */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="empleado-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_estado')->textInput() ?>

    <?= $form->field($model, 'id_tipo_documento')->textInput() ?>

    <?= $form->field($model, 'numero_documento')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apellido')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'fecha_nacimiento')->widget(DateControl::classname(), [
                                                            'type'=>DateControl::FORMAT_DATE
                                                        ]);         
    ?>

    <?= $form->field($model, 'telefono')->textInput() ?>

    <?= $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_genero')->textInput() ?>

    <?= $form->field($model, 'id_ciudad')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

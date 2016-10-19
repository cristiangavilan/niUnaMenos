<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use app\models\Provincia;

/* @var $this yii\web\View */
/* @var $model app\models\Ciudad */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ciudad-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_provincia')->widget(Select2::classname(), [
        //'data' => ArrayHelper::map(EstadoAviso::find()->all(), 'id_estado_aviso', 'nombre'),
            'data' => \yii\helpers\ArrayHelper::map(Provincia::find()->all(),'id_provincia', 'nombre'),
            'options' => ['placeholder' => 'Seleccione una provincia'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

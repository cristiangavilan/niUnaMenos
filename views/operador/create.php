<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Operador */

$this->title = Yii::t('app', 'Create Operador');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Operadors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="operador-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

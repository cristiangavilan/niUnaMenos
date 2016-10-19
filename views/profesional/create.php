<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Profesional */

$this->title = Yii::t('app', 'Create Profesional');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Profesionals'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profesional-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

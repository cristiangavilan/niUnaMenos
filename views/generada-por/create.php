<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\GeneradaPor */

$this->title = Yii::t('app', 'Create Generada Por');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Generada Pors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="generada-por-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

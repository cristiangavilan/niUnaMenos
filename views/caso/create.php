<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Caso */

$this->title = Yii::t('app', 'Create Caso');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Casos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="caso-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

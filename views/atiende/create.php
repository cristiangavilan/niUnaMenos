<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Atiende */

$this->title = Yii::t('app', 'Create Atiende');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Atiendes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="atiende-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

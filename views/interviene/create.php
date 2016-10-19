<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Interviene */

$this->title = Yii::t('app', 'Create Interviene');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Intervienes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="interviene-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

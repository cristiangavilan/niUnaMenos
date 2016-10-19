<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Asiste */

$this->title = Yii::t('app', 'Create Asiste');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Asistes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asiste-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Vinculo */

$this->title = Yii::t('app', 'Create Vinculo');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Vinculos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vinculo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

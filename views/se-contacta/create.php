<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SeContacta */

$this->title = Yii::t('app', 'Create Se Contacta');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Se Contactas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="se-contacta-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

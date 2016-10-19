<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\GeneradaPor */

$this->title = $model->id_persona_agresor;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Generada Pors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="generada-por-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id_persona_agresor' => $model->id_persona_agresor, 'id_caso' => $model->id_caso], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id_persona_agresor' => $model->id_persona_agresor, 'id_caso' => $model->id_caso], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_persona_agresor',
            'id_caso',
        ],
    ]) ?>

</div>

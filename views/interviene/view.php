<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Interviene */

$this->title = $model->id_caso;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Intervienes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="interviene-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id_caso' => $model->id_caso, 'id_empleado_profesional' => $model->id_empleado_profesional], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id_caso' => $model->id_caso, 'id_empleado_profesional' => $model->id_empleado_profesional], [
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
            'id_caso',
            'id_empleado_profesional',
        ],
    ]) ?>

</div>

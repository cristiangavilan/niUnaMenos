<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Ciudad */

$this->title = $model->id_ciudad;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ciudads'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ciudad-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id_ciudad], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id_ciudad], [
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
            'id_ciudad',
            'nombre',
            'id_provincia',
        ],
    ]) ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SeRelaciona */

$this->title = $model->id_persona1;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Se Relacionas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="se-relaciona-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id_persona1' => $model->id_persona1, 'id_vinculo' => $model->id_vinculo, 'id_persona2' => $model->id_persona2], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id_persona1' => $model->id_persona1, 'id_vinculo' => $model->id_vinculo, 'id_persona2' => $model->id_persona2], [
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
            'id_persona1',
            'id_vinculo',
            'id_persona2',
        ],
    ]) ?>

</div>

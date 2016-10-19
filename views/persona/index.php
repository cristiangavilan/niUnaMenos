<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PersonaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Personas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="persona-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Persona'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_persona',
            'Id_estado',
            'id_tipo_documento',
            'numero_documento',
            'nombre',
            // 'apellido',
            // 'fecha_nacimiento',
            // 'id_genero',
            // 'telefono',
            // 'direccion',
            // 'email:email',
            // 'id_ciudad',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

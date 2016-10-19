<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

$es_administrador = !Yii::$app->user->isGuest && (Yii::$app->user->identity->id_rol == 1);
$es_empleado = !Yii::$app->user->isGuest && (Yii::$app->user->identity->id_rol == 2);
$es_operador = !Yii::$app->user->isGuest && (Yii::$app->user->identity->id_rol == 3);
$es_profesional = !Yii::$app->user->isGuest && (Yii::$app->user->identity->id_rol == 4);
$es_usuario= !Yii::$app->user->isGuest && (Yii::$app->user->identity->id_rol == 5);


AppAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => '#NiUnaMenos',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    if ($es_administrador){
        echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            //['label' => 'Inicio', 'url' => ['/site/index']],
            //['label' => 'A cerca de', 'url' => ['/site/about']],
            //['label' => 'Contacto', 'url' => ['/site/contact']],
            ['label' => 'Empleados', 'url' => ['/empleado/index']],
            ['label' => 'Persona', 'url' => ['/persona/index']],
            ['label' => 'Usuarios', 'url' => ['/usuario/index']],
            ['label' => 'Victima', 'url' => ['/victima/index']],
            ['label' => 'Ciudades', 'url' => ['/ciudad/index']],
            
            Yii::$app->user->isGuest ? (
                ['label' => 'Ingresar', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    }
    if($es_empleado){
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
                //['label' => 'Inicio', 'url' => ['/site/index']],
                //['label' => 'A cerca de', 'url' => ['/site/about']],
                //['label' => 'Contacto', 'url' => ['/site/contact']],
                //['label' => 'Empleado', 'url' => ['/empleado/index']],
                ['label' => 'Persona', 'url' => ['/persona/index']],
                ['label' => 'Usuarios', 'url' => ['/usuario/index']],
                ['label' => 'Genero', 'url' => ['/genero/index']],

                Yii::$app->user->isGuest ? (
                    ['label' => 'Ingresar', 'url' => ['/site/login']]
                ) : (
                    '<li>'
                    . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
                    . Html::submitButton(
                        'Logout (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'btn btn-link']
                    )
                    . Html::endForm()
                    . '</li>'
                )
            ],
        ]);
    }if(!$es_administrador && !$es_empleado){
        echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
                ['label' => 'Inicio', 'url' => ['/site/index']],
                ['label' => 'A cerca de', 'url' => ['/site/about']],
                ['label' => 'Contacto', 'url' => ['/site/contact']],
                //['label' => 'Empleado', 'url' => ['/empleado/index']],
                //['label' => 'Persona', 'url' => ['/persona/index']],
                //['label' => 'Usuarios', 'url' => ['/usuario/index']],

                Yii::$app->user->isGuest ? (
                    ['label' => 'Ingresar', 'url' => ['/site/login']]
                ) : (
                    '<li>'
                    . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
                    . Html::submitButton(
                        'Logout (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'btn btn-link']
                    )
                    . Html::endForm()
                    . '</li>'
                )
            ],
        ]); 
    }
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
               
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; #NiUnaMenos <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

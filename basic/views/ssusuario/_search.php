<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SsusuarioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ssusuario-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idUsuario') ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'senha') ?>

    <?= $form->field($model, 'nome') ?>

    <?= $form->field($model, 'professor') ?>

    <?php // echo $form->field($model, 'idSala') ?>

    <?php // echo $form->field($model, 'idPerfil') ?>

    <?php // echo $form->field($model, 'urlFotoPerfil') ?>

    <?php // echo $form->field($model, 'urlScreenshot') ?>

    <?php // echo $form->field($model, 'paginaAtual') ?>

    <?php // echo $form->field($model, 'sessaoAtiva') ?>

    <?php // echo $form->field($model, 'deviceId') ?>

    <?php // echo $form->field($model, 'accessToken') ?>

    <?php // echo $form->field($model, 'accessTimestamp') ?>

    <?php // echo $form->field($model, 'genero') ?>

    <?php // echo $form->field($model, 'idUsuarioTipo') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Ssusuario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ssusuario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'senha')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'professor')->textInput() ?>

    <?= $form->field($model, 'idSala')->textInput() ?>

    <?= $form->field($model, 'idPerfil')->textInput() ?>

    <?= $form->field($model, 'urlFotoPerfil')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'urlScreenshot')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'paginaAtual')->textInput() ?>

    <?= $form->field($model, 'sessaoAtiva')->textInput() ?>

    <?= $form->field($model, 'deviceId')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accessToken')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accessTimestamp')->textInput() ?>

    <?= $form->field($model, 'genero')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idUsuarioTipo')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

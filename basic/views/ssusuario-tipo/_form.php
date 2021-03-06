<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SsusuarioTipo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ssusuario-tipo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idUsuarioTipo')->textInput() ?>

    <?= $form->field($model, 'nome')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ssusuario */

$this->title = 'Update Ssusuario: ' . $model->idUsuario;
$this->params['breadcrumbs'][] = ['label' => 'Ssusuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idUsuario, 'url' => ['view', 'idUsuario' => $model->idUsuario, 'idUsuarioTipo' => $model->idUsuarioTipo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ssusuario-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

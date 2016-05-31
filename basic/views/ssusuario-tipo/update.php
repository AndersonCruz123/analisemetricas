<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SsusuarioTipo */

$this->title = 'Update Ssusuario Tipo: ' . $model->idUsuarioTipo;
$this->params['breadcrumbs'][] = ['label' => 'Ssusuario Tipos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idUsuarioTipo, 'url' => ['view', 'id' => $model->idUsuarioTipo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ssusuario-tipo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

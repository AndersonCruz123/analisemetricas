<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SsusuarioTipo */

$this->title = 'Create Ssusuario Tipo';
$this->params['breadcrumbs'][] = ['label' => 'Ssusuario Tipos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ssusuario-tipo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

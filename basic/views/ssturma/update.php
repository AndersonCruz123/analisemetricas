<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SSTURMA */

$this->title = 'Update Ssturma: ' . $model->idTurma;
$this->params['breadcrumbs'][] = ['label' => 'Ssturmas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idTurma, 'url' => ['view', 'id' => $model->idTurma]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ssturma-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

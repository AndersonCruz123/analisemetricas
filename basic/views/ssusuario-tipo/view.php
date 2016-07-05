<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SsusuarioTipo */

$this->title = $model->idUsuarioTipo;
$this->params['breadcrumbs'][] = ['label' => 'Ssusuario Tipos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ssusuario-tipo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <!--<p>
        <?= Html::a('Update', ['update', 'id' => $model->idUsuarioTipo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idUsuarioTipo], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    -->

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idUsuarioTipo',
            'nome',
        ],
    ]) ?>

</div>

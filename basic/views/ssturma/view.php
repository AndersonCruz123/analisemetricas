<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\SSTURMA */

$this->title = $model->idTurma;
$this->params['breadcrumbs'][] = ['label' => 'Ssturmas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ssturma-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idTurma], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idTurma], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idTurma',
            'nome',
        ],
    ]) ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Ssusuario */

$this->title = $model->idUsuario;
$this->params['breadcrumbs'][] = ['label' => 'Ssusuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ssusuario-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idUsuario' => $model->idUsuario, 'idUsuarioTipo' => $model->idUsuarioTipo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idUsuario' => $model->idUsuario, 'idUsuarioTipo' => $model->idUsuarioTipo], [
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
            'idUsuario',
            'email:email',
            'senha',
            'nome',
            'professor',
            'idSala',
            'idPerfil',
            'urlFotoPerfil:url',
            'urlScreenshot:url',
            'paginaAtual',
            'sessaoAtiva',
            'deviceId',
            'accessToken',
            'accessTimestamp:datetime',
            'genero',
            'idUsuarioTipo',
        ],
    ]) ?>

</div>

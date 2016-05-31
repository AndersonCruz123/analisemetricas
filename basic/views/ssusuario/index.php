<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SsusuarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ssusuario-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?//Html::a('Create Ssusuario', ['create'], ['class' => 'btn btn-success'])?>
        <table border="2">
            <tr><td>
                <form name="input" action="confusao_turma_grafico.php" target="_blank">
                <input type="submit" value="Grafico De Confusão" >
                </form>
            </td>
            
            <td>
                <form name="input2" action="desordem_turma_grafico.php" target="_blank">
                <input type="submit" value="Grafico De Desordem">
                </form>
            </td>
            
            <td>    
                <form name="input3" action="timestemp.php" target="_blank">
                <input type="submit" value="Grafico Duração">
                </form>
            </td>
            
            <td>
                <form name="input4" action="score.php" target="_blank">
                <input type="submit" value="Pontuação">
                </form>
            </td></tr>
        </table>        
    </p>
    <p>
        Os dados apresnetados nos gráficos são referentes aos exercicios de primeira ordem, aplicados á turma.
    </p>
     
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idUsuario',
            'nome',
            'email:email',
            //'senha',
            'professor',
            'idSala',
            'idPerfil',
            // 'urlFotoPerfil:url',
            // 'urlScreenshot:url',
            // 'paginaAtual',
            // 'sessaoAtiva',
            // 'deviceId',
            // 'accessToken',
            // 'accessTimestamp:datetime',
            // 'genero',
            // 'idUsuarioTipo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

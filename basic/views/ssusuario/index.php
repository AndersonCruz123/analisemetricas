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
        <table border="2">
            <tr><td>
                <form name="input" action="Graficos/Grafico_confusao.php" target="_blank">
                <input type="submit" value="Gráfico De Confusão" >
                </form>
            </td>
            
            <td>
                <form name="input2" action="Graficos/Grafico_desordem.php" target="_blank">
                <input type="submit" value="Gráfico De Desordem">
                </form>
            </td>
            
            <td>    
                <form name="input3" action="Graficos/Grafico_timestemp.php" target="_blank">
                <input type="submit" value="Gráfico Duração">
                </form>
            </td>
            
            <td>
                <form name="input4" action="Graficos/Grafico_score.php" target="_blank">
                <input type="submit" value="Gráfico Pontuação">
                </form>
            </td></tr>
        </table>        
    </p>
    <p>
        Os dados apresentados nos gráficos são referentes a dados de exercicios aplicados á turma.
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
            //'idSala',
            //'idPerfil',
            // 'urlFotoPerfil:url',
            // 'urlScreenshot:url',
            // 'paginaAtual',
            // 'sessaoAtiva',
            // 'deviceId',
            // 'accessToken',
            // 'accessTimestamp:datetime',
            // 'genero',
            // 'idUsuarioTipo',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>

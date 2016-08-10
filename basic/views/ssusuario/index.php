<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SsusuarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    #iniciar{
        display: inline-block;
        background-color: #2479a9;
        color: #FFF;
        padding: 10px 20px;
        text-decoration: none;
        box-sizing: border-box;
        font-family: Helvetica, Arial, sans-serif;
        font-size: 14px;
        border: 0px;
    }
    #iniciar:hover {
        background-image: linear-gradient(to bottom, transparent, rgba(0,0,0,.25));
        cursor: pointer;
    }
</style>
<div class="ssusuario-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php //
    // colocar o arquivo em var/www/html/signal/basic/views/ssusuario
    //// echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <table>
            <tr><td>
                <form name="input" action="Graficos/Grafico_confusao.php" target="_blank">
                <input id="iniciar" type="submit" value="Confusion Graph" >
                </form>
            </td>
            
            <td>
                <form name="input2" action="Graficos/Grafico_desordem.php" target="_blank">
                <input id="iniciar" type="submit" value="Disorder Graph">
                </form>
            </td>
            
            <td>    
                <form name="input3" action="Graficos/Grafico_timestemp.php" target="_blank">
                <input id="iniciar" type="submit" value="Duration Graph">
                </form>
            </td>
            
            <td>
                <form name="input4" action="Graficos/Grafico_score.php" target="_blank">
                <input id="iniciar" type="submit" value="Score Graph">
                </form>
            </td></tr>
        </table>        
    </p>
    <p>
        The data presented in the graphs are referred to exercises data applied will class..
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

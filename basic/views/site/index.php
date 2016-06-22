<?php
/* @var $this yii\web\View */
$this->title = 'Signal Metrics';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1> Sistema de Análises </h1>

        <p class="lead">Sistema de Análises Grafíca .</p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Descrição</h2>

                <p align=”Justify”>Este sistema tem como objetivo demonstrar de forma grafica, informações referentes as turmas participantes do esperimento de monitoramento de sinais realizado em uma sala de aula pela equipe do projeto SIGNAL.</p>

            </div>
            <div class="col-lg-4">
                <h2>O que sera feito?</h2>

                <p align=”Justify”> Durante a aplicação do experimento, serão coletados diversos dados como, um deles são as informações referentes a resolução de dos questionarios, desses questionarios serão estraidos tempo de resposta, quantidade de acertos entre outros dados dos quais serão aplicados algumas metricas de analise..</p>

                </p>
            </div>
            <div class="col-lg-4">
                <h2>Metricas</h2>

                <p align=”Justify” > Metricas como, Desordem, Nivel de Confusão, Score, Desviação entre outras.</p>

                <p> <div id="logo"><?php //echo CHtml::image(Yii::app()->request->baseUrl."/images/logo.gif","ballpop"); ?></div> </p>

            </div>
        </div>

    </div>
</div>

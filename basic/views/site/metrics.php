
<?php
use yii\helpers\Html;    


/* @var_dump(expression)r $this yii\web\View */
$this->title = 'Signal Metrics';
?>
<div class="site-index">

    <div class="jumbotron">
        <!--<h1>Sistema de Análises</h1> -->
        <h1>Analysis Systems<h1>
        <p class="lead">Management and performance graphs analysis of the users in the classroom</p>
    </div>

    <div class="body-content">

<div class="text-center">
<?php
echo Html::a('<strong>Try it!</strong>', ['analysis'], ['class' => 'btn btn-info btn-lg'])
?>
</div>

        <div class="row">
            <div class="col-lg-4" align="Justify">
                <h2>About</h2>
                <b>The System</b>

                <p> This system was developed to provide support for the teacher who uses the composer during the experiment in the classroom. The experiment is part of a stage of SIGNAL research project, which is being developed with support from Samsung and Computing Institute of the Federal University of Amazonas.
                </p>

            </div>
            <div class="col-lg-4" align="Justify">
                <h2>How?</h2>
                <b> Data collect </b>

                <p> The data collection, so that the analysis can be done, happen during the experiment using the tablet in the classroom.</p>

                </p>
            </div>
            <div class="col-lg-4" align="Justify">
                <h2>Result</h2>
                <b> Application Metricss </b>

                <p > Through the data generated during testing, the analysis system will supply evaluation metrics. As for example, the response time of each question on a questionnaire, the order in which it was answered, and the level of doubt among others.
                </p>

            </div>
        </div>

    </div>
</div>

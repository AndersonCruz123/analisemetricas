
<?php
use yii\helpers\Html;    


/* @var_dump(expression)r $this yii\web\View */
$this->title = 'Signal Metrics';
?>
<div class="site-index">

    <div class="jumbotron">
        <!--<h1>Sistema de Análises</h1> -->
        <h1>Learning Metrics Analysis<h1>
        <p class="lead">Management and performance charts of students in the classroom of the future</p>
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

                <p> This system was developed to provide support for the teacher who uses
the composer/player/service during a lecture in the classroom of the
future. The learning metrics analysis is part of the SIGNAL research
project, which is being developed from Institute of Computing at
Federal University of Amazonas with support from Samsung Eletrônica da
Amazônia.
                </p>

            </div>
            <div class="col-lg-4" align="Justify">
                <h2>How?</h2>
                <b> Data collection</b>

                <p>The data collection is made up using a tablet with learning objects
                    instrumented.</p>

                </p>
            </div>
            <div class="col-lg-4" align="Justify">
                <h2>Result</h2>
                <b>Learning Metrics</b>

                <p > Through the data generated during classes, the learning metrics
analysis system will supply several evaluation metrics.
                </p>

            </div>
        </div>

    </div>
</div>

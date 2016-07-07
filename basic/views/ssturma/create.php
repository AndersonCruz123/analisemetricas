<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SSTURMA */

$this->title = 'Create Ssturma';
$this->params['breadcrumbs'][] = ['label' => 'Ssturmas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ssturma-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

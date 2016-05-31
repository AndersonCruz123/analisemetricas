<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Ssusuario */

$this->title = 'Create Ssusuario';
$this->params['breadcrumbs'][] = ['label' => 'Ssusuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ssusuario-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<style>
    .navbar-brand > img{
        width:97px; 
        height:30px;
    }
.navbar .nav > li > a {
    
    color: #2479a9;
}

.nav > li > a:hover{
    background-color:#2479a9;
}
.navbar .brand, .navbar .nav > li > a:hover {
    color: #2479a9;
}

.nav .open > a
{
    background:green;
    
}

.navbar-inverse .navbar-nav>.active>a:hover {
  color: white;
  background-color: #2479a9;

}

.navbar-inverse .navbar-nav > .active > a, .navbar-inverse .navbar-nav > .active > a:hover, .navbar-inverse .navbar-nav > .active > a:focus{
  color: #fff;
  background-color: #2479a9;
}
.navbar-inverse {
  background-color: white;
  border-color: #080808;
}

</style>
<body>

<?php $this->beginBody() ?>
    <div class="wrap">
        <?php
            NavBar::begin([
                'brandLabel' => Html::img('site/sitecomposer-16.png'),
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar navbar-inverse navbar-fixed-top',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => 'Metrics', 'url' => ['/site/metrics']],
                    ['label' => '' ],
                    /*Yii::$app->user->isGuest?
                        ['label' => 'Login', 'url' => ['/site/login']] :
                        ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                            'url' => ['/site/logout'],
                            'linkOptions' => ['data-method' => 'post']],*/
                ],
            ]);
            NavBar::end();
        ?>

        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container" align="center">
            <p class="pull-left"> <font size="2"> SIGNAL |  Version 1.0 | All rights reserved | <?= date('Y') ?> </font> </p>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

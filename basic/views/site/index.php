<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'Project Signal';

?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <style>
  body {
      position: relative;
  }
  #section1 {padding-top:50px;height:800px; 
    background-image: url('/analisemetricas/basic/web/site/sitecomposer-22.png');   
   background-size: 100% 100%; background-repeat: no-repeat;}
  #section2 {padding-top:50px;height:500px;color: #fff; background-color: #673ab7;}
  #section3 {padding-top:50px;height:500px;color: #fff; background-color: #009688;}
  #section4 {padding-top:50px;height:500px;color: #fff; background-color: #00bcd4;}
  #section5 {padding-top:50px;height:500px;color: #fff; background-color: #009688;}
  #logo{
  margin-left: 70px;    
  }
  .marginButtomSection1{
    margin-top: 400px;
    margin-right: 100px;
    margin-left: 500px;
      }
  .marginButtomSection2{
    margin-top: 100px;
    margin-right: 100px;
    margin-left: 500px;
      }

      #myNavbar{
        background-color: white;
      }
      #sections{
        margin-left: 600px;
      }
      #container-fluid{
        background-color: blue;
      }
.navbar .nav > li > a {
    
    color: #2479a9;
}

.nav > li > a:hover{
    background-color:#2479a9;
}
.navbar .brand, .navbar .nav > li > a:hover {
    color: #1048ae;
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
  background-color: #1048ae;
}

  </style>

<body data-spy="scroll" data-target=".navbar" data-offset="50">

<nav class="navbar navbar-inverse navbar-fixed-top" id="nav">
  <div class="container-fluid">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#" id="logo"><img src="/analisemetricas/basic/web/site/sitecomposer-16.png" width="97px" height="30px"></a>
    </div>
    <div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav" id="sections">
          <li><a href="#section1">Signal</a></li>
          <li><a href="#section2">Dataset</a></li>
          <li><a href="#section3">Metrics</a></li>
          <li><a href="#section4">Papers</a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>

<div id="section1" class="container-fluid" id="container-fluid">
<div class="marginButtomSection1">
<?php
echo Html::a('<strong>See More</strong>', ['signal'], ['class' => 'btn btn-info btn-lg'])
?>
</div>

</div>
<div id="section2" class="container-fluid">
  <h1>Data set</h1>
  <p>We performed several experiments to obtain data that are used in research in progress:</p>
  <p>Sensors used: Accelerometer, Galvanic Skin Response, Heartbeat, Gyroscope and others. Click for download dataset</p>  
<a href="/analisemetricas/basic/dataset/RecognitionEmotion.zip"><button type="button" class="btn btn-primary">Recogntion Emotions</button></a>
<a href="/analisemetricas/basic/dataset/RecognitionSitting.zip"><button type="button" class="btn btn-secondary">Recognition Sitting</button></a>
<a href="/analisemetricas/basic/dataset/RecognitionStanding.zip"><button type="button" class="btn btn-success">Recognition Standing</button></a>
<a href="/analisemetricas/basic/dataset/RecognitionWalking.zip"><button type="button" class="btn btn-info">Recognition Walking</button></a>
<a href="/analisemetricas/basic/dataset/RecognitionSeizure.zip"><button type="button" class="btn btn-warning">Recognition Seizure</button></a>
<a href="/analisemetricas/basic/dataset/RecognitionFaiting.zip"><button type="button" class="btn btn-danger">Recognition Faiting</button></a>
<a href="/analisemetricas/basic/dataset/ExperimentalWEKASoftware.zip"><button type="button" class="btn btn-primary">WEKA experimental</button></a>
</div>


<div id="section3" class="container-fluid">
  <h1>Metrics</h1>
  <p>Management and performance graphs analysis of the users in the classroom</p>
  <p>Metrics development:</p>
  <ul>
    <li>Level of orderliness</li>
    <li>Level of confusion</li>
    <li>Level of understand</li>
   </ul>
<div class="marginButtomSection2">
<?php
echo Html::a('<strong>Acess system</strong>', ['metrics'], ['class' => 'btn btn-info btn-lg'])
?>
</div>
</div>

<div id="section4" class="container-fluid">
  <h1>Papers</h1>
  <p>Papers plublished</p>
  <ul>
    <li>ENCOSIS</li>
    <li>Workshop SocialEdu</li>
    <li>PostProceedingsSocialEdu</li>
   </ul>
<div class="marginButtomSection2">
<?php
echo Html::a('<strong>Acess Papers</strong>', ['analysis'], ['class' => 'btn btn-success btn-lg'])
?>
</div>
</div>

</body>



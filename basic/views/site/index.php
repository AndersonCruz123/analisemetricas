<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'Project Signal';
//    background-image: url('site/sitecomposer-22.png');   
  // background-size: 100% 100%; background-repeat: no-repeat;
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
  #section1 {padding-top:50px;height:800px; background-color: #006699;}
  #section2 {padding-top:50px;height:500px;color: #fff; background-color: #4a8fb6;}
  #section3 {padding-top:50px;height:500px;color: #fff; background-color: #41b0e2;}
  #section4 {padding-top:50px;height:500px;color: #fff; background-color: #2479a9;}
  #section5 {padding-top:50px;height:500px;color: #fff; background-color: #2479a9;}
  #logo{
  margin-left: 70px;    
  }


  .marginButtomSection1{
          
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
.navbar-inverse{
    padding-right: 0px;
  padding-left: 0px;
background-color: white;
border-color: #2479a9;
}
.navbar-inverse .navbar-nav > .active > a, .navbar-inverse .navbar-nav > .active > a:hover, .navbar-inverse .navbar-nav > .active > a:focus{
  color: #fff;
  background-color: #2479a9;
}


.container-fluid>.navbar-header{
  background-color: white;
}

.navbar-inverse .navbar-toggle:hover {
  background-color: #2479a9;
}
#DivImgTablet{
  margin-bottom: 0px;
  background-image: url('site/sitecomposer-22.png');   
  background-size: 100% 100%; background-repeat: no-repeat;
  height: 600px;
  padding: 0px;
}

#btnSeeMore{
  margin-top: 400px;
}
#project{
    background-color: #2479a9;
    color: white;
}
#h1Education{
     color: white;
     margin-top: 60px; 
}#gridBtn1{
     margin-top: 60px;
     margin-left: 240px; 
}#gridBtn2{
     margin-top: 30px;
     margin-left: 285px; 
}#list{
  margin-top: 70px;
  margin-left: 300px;
  font-weight: bold;
  font-size: 12pt;
}#button > .btn:hover{
  color: white;
  background-color: #2479a9;
}#button > .btn{
  color: #2479a9;
  background-color: white;
  font-weight: bold;
}#buttonPapers > .btn:hover{
  color: white;
  background-color: #41b0e2;
}#buttonPapers > .btn{
  color: #2479a9;
  background-color: white;
  font-weight: bold;
}#listLinks > a{
  color: white;
  font-weight: bold;
}#p{
  margin-top: 20px;
  margin-left: 60px;
  font-size: 14pt;
  font-weight: bold;
}#imgDivProject{
    margin-top: 30px;
}.hrBorder{
  border-style: dashed;
  margin-bottom: 60px;  
}


  </style>

<body data-spy="scroll" data-target=".navbar" data-offset="50">

<nav class="navbar navbar-inverse navbar-fixed-top" id="nav">
     <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#" id="logo"><img src="site/sitecomposer-16.png" width="97px" height="30px"></a>
    </div>
    <div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav" id="sections">
          <li><a href="#section1"><strong>Signal</strong></a></li>
          <li><a href="#section2"><strong>Datasets</strong></a></li>
          <li><a href="#section3"><strong>Learning Metrics</strong></a></li>
          <li><a href="#section4"><strong>Papers</strong></a></li>
        </ul>
      </div>
  </div>
</nav>



<div class="site-index">

    <div class="jumbotron" id="DivImgTablet">
<!--  <div class="marginButtomSection1">
    <?php
    //echo Html::a('<strong>See More</strong>', ['signal'], ['class' => 'btn btn-info btn-lg', 'id'=>'btnSeeMore'])
    ?>
  </div>-->
        <!--<h1>Sistema de Análises</h1> -->

  </div>
</div>

<div id="section1" class="container-fluid" id="container-fluid">

<div class="site-index">

    <div class="jumbotron" id="project">
        <!--<h1>Sistema de Análises</h1> -->
        <h1 align="center">The project</h1>
        <p class="lead" align="center">The main aim of the SIGNAL (System for Intelligent enGagement aNALysis
in digital education context) project is to collect and analyse
multidimensional data from sensors and honest signals to infer the
correlation between infrastructure, educational software, learning
objects and students activity/behavior, in order to recognize,
classify and recommend learning parameters to be applied in the
context of digital education in a classroom of the future.</p>

     <img id="imgDivProject" src="site/sitecomposer-18.png" width="15%" height="15%">
     <p id="txtDivProject">The Support</p>

     <img id="imgDivProject" src="site/sitecomposer-17.png" width="15%" height="15%">
     <p id="txtDivProject">Realization</p>
    </div>
</div>
<h1 id="h1Education" align="center">Technology that makes education better!</h1>
</div>

<div id="section2" class="container-fluid">
  <h1 align="center">Datasets</h1>
 <hr class="hrBorder" width=50%  align=center>
  <p id="p">We generated several datasets to be used in our experiments. Sensors used: Accelerometer, Galvanic Skin Response, Heartbeat, Gyroscope and others. They are available below.</p>  

<div id="gridBtn1">
<a href="dataset/RecognitionEmotion.zip" id="button"><button type="button" class="btn btn-secondary">Emotion Recognition</button></a>
<a href="dataset/RecognitionSitting.zip" id="button"><button type="button" class="btn btn-secondary">Sitting Recognition</button></a>
<a href="dataset/RecognitionStanding.zip" id="button"><button type="button" class="btn btn-secondary">Standing Recognition</button></a>
<a href="dataset/RecognitionWalking.zip" id="button"><button type="button" class="btn btn-secondary">Walking Recognition</button></a>
</div>

<div id="gridBtn2">
<a href="dataset/RecognitionFaiting.zip" id="button"><button type="button" class="btn btn-secondary">Fainting Recognition</button></a>
<a href="dataset/RecognitionSeizure.zip" id="button"><button type="button" class="btn btn-secondary">Epileptic Seizure Recognition</button></a>
<a href="dataset/ExperimentalWEKASoftware.zip" id="button"><button type="button" class="btn btn-secondary">WEKA Experiments</button></a>
</div>
</div>


<div id="section3" class="container-fluid">
  <h1 align="center">Learning Metrics</h1>
 <hr class="hrBorder" width=50%  align=center>  
  <p id="p">Charts of several learning metrics in a future classroom. Metrics
development:</p>
  <ul class="list-inline" id="list">
    <li>Level of orderliness</li>
    <li>|</li>
    <li>Level of confusion</li>
    <li>|</li>
    <li>Level of understand</li>
   </ul>
<div class="marginButtomSection2" id="button">
<?php
echo Html::a('Acess system', ['metrics'], ['class' => 'btn btn-secondary','id'=>'button'])
?>
</div>
</div>

<div id="section4" class="container-fluid">
  <h1 align="center">Papers</h1>
 <hr class="hrBorder" width=50%  align=center>  
  <p id="p">Papers plublished:</p>
  <ul id="listLinks">
    <a href="papers/CCIS.pdf"><li>Experimental Evaluation on Machine Learning Techniques for Human
Activities Recognition in Digital Education Context.  Springer
Communications in Computer and Information Science (CCIS’2016)</li></a>
    
    <a href="papers/DigEdu2015.pdf"><li>Experimental Evaluation on Machine Learning Techniques for Human
Activities Recognition in Digital Education Context. 1st International
Workshop on Social Computing in Digital Education (DigEdu’2015)</li></a>
    
    <li>The Role of Agent-based Simulation in Education. 2nd International
Workshop on Social Computing in Digital Education (DigEdu’2016)</li>
   
      <a href="papers/ENCOSIS.pdf"> <li>Avaliação Experimental de Técnicas de Aprendizagem de Máquina para o
Reconhecimento de Atividades Humanas no Contexto da Educação
Tecnológica. IV Encontro Regional de Computação e Sistemas de
Informação (ENCOSIS’2015)</li></a>
   </ul>
<!--<div class="marginButtomSection2" id="buttonPapers">
<?php
//echo Html::a('Acess Papers', ['analysis'], ['class' => 'btn btn-secondary'])
?>
</div>
</div>-->

</body>



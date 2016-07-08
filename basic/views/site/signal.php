
<?php
use yii\helpers\Html;    


/* @var_dump(expression)r $this yii\web\View */
$this->title = 'Signal Metrics';
?>
<style>
#project{
    background-color: #2479a9;
    color: white;
}    
#projectOverView{
    background-image: url("/analisemetricas/basic/web/site/celular.jpg");
    background-size: 100% 100%; background-repeat: no-repeat;
    color: #2479a9;
    height: 400px;
}

#projectTecnologies{
    background-image: url("/analisemetricas/basic/web/site/sitecomposer-19.png");
    background-size: 100% 100%; background-repeat: no-repeat;
    color: white;
    width: 100%;
    height: 100%
}
#projectResult{
    background-image: url("/analisemetricas/basic/web/site/sitecomposer-21.png");
    background-size: 100% 100%; background-repeat: no-repeat;
    color: white;
    width: 100%;
    height: 300px;
}


#projectTeam{
    background-image: url("/analisemetricas/basic/web/site/sitecomposer-20.png");
    background-size: 100% 100%; background-repeat: no-repeat;
    color: white;
    height: 500px;
}

#txtDivProject{
    font-size: 13pt;
    margin-top: 10px;
}
#imgDivProject{
    margin-top: 40px;
}
.h1DivProject{
    font-size: 25pt;
    margin-top: 15px;
}
#h2DivTecnologies{
    font-size: 30pt;
    margin-top: 65px;
}
#h2DivResult{
    font-size: 20pt;
    margin-right: 20px;
    margin-top: 100px;
}
#pDivResult{
    font-size: 30pt;
    margin-right: 20px;
}


</style>

<div class="site-index">

    <div class="jumbotron" id="project">
        <!--<h1>Sistema de Análises</h1> -->
        <h1 align="right">The project</h1>
        <p class="lead" align="right">The SIGNAL project is coordinated by Professor Dr. Raimundo Barreto together with Samsung Electronics Amazon belongs to Federal University of Amazonas. Topics of interest digital education, intelligent systems, recognition of activity and behavior, use of sensors and others.</p>

     <img id="imgDivProject" src="/analisemetricas/basic/web/site/sitecomposer-18.png" width="15%" height="15%">
     <p id="txtDivProject">Support</p>

     <img id="imgDivProject" src="/analisemetricas/basic/web/site/sitecomposer-17.png" width="15%" height="15%">
     <p id="txtDivProject">Realization</p>
    </div>

    <div class="jumbotron" id="projectOverView">
        <h3 class="h1DivProject" >+ 1 Year reasearch</h3>
        <h3 class="h1DivProject" >+ Papers</h3> 
        <h3 class="h1DivProject" >+ 20 researches</h3>
        <h3 class="h1DivProject" >+ 10 applications</h3> 
    </div>

   <div class="jumbotron" id="projectTecnologies">
        <strong><h2 id="h2DivTecnologies" align="left">High-Tech<h2></strong>
        <h3 class="h1DivTecnologies" align="left">Equipments and Sensors</h3> 
    </div>
 
   <div class="jumbotron" id="projectTeam">
        <strong><h2 id="h2DivTecnologies" align="right">Team<h2></strong>
        <h3 class="h1DivTecnologies" align="right">Qualified</h3> 
    </div>
 
   <div class="jumbotron" id="projectResult">
        <h3 id="h2DivResult" align="right">Focus on</h3> 
        <p id="pDivResult" align="right">Results</p>
 </div>


</div>

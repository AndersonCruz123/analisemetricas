<meta charset = "UTF-8"/>
<?php
  include 'consultas.php';
  $x = 0;
  $tempoAlunos = array();
  $nomes = array();
  while($x < count(ss_turma())){
      $id = ss_turma()[$x][0];
      $nome = ss_turma()[$x][1];
      $timestamp = timestamp($id);
      
      if (count($timestamp) <= 1){
        $tempoAlunos[$x] = 0;
        $nomes[$x] = $nome;
      }else{
        $data_final = date("d-m-Y G:i:s",  $timestamp[count($timestamp) - 1]);
        $data_inicial = date("d-m-Y G:i:s",  $timestamp[0]);
        $data_final = strtotime($data_final);
        $data_inicial = strtotime($data_inicial);
        $diferenca = $data_final - $data_inicial;

        $minutos = floor($diferenca / 60);

        $tempoAlunos[$x] = $minutos;
        $nomes[$x] = $nome;

      }
      $x++;
  }

  //GERA GRAFICO COM OS RESULTADOS DA TURMA\\
  $html = "<html>
           <head>
           <script type='text/javascript' src='https://www.gstatic.com/charts/loader.js'></script>
           <script type='text/javascript'>
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {";
  $html = $html." 
                  var dataConfusaoAluno = google.visualization.arrayToDataTable([
                  ['Name', 'Time in minutes'],";
                  for($i = 0; $i < count($nomes);$i++){
                     $html.="['".$nomes[$i]."',".$tempoAlunos[$i]."],";
                  }
  $html.=" ]);              
                  var optionsAluno = {
                    title: 'Time spent to answer the quiz'                 
                  };

                  var chartConfusaoAluno = new google.visualization.BarChart(document.getElementById('confusaoAluno'));
                  chartConfusaoAluno.draw(dataConfusaoAluno, optionsAluno);

              }
          </script>

          </head>
          <body>
            <div id='confusaoAluno' style='width: 900px; height: 1300px;'></div>
            <div id='QuestaoTurma' style='width: 650px; height: 600px;'></div>

          </body>
          </html>";
  echo $html;
?>
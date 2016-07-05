<meta charset = "UTF-8"/>
<?php
  include 'consultas.php';
  $x = 0;
  $scoreAlunos = array(array());

  while($x < count(ss_turma())){
      $id = ss_turma()[$x][0];
      $nome = ss_turma()[$x][1];
      $i = 0;
      $parametros = parametros($id);
      //exemplo de parametro tipo:
      // 1 - {"mQuestionId":180,"mQuestionnaireId":41} escolha de questao
      // or
      // 2 - {"mCorrectAnswer":"[373]","mQuestionnaireId":41,"mSelectedAnswer":"[373]","mQuestionId":180} selecao de alternativa de questao
      $id = [];
      $respostaSelecionada = [];
      $respostaCorreta = [];
      $ids = [];
      $j = 0;
      $contIds = 0;
      foreach ($parametros as $action) {
        $part1 = split(':', $action);
        if(count($part1)  == 5){ //Tamanho do tipo 2;
          
          $id = split('}', $part1[4]);
          $idQuestoes = $id[0];
          if($idQuestoes > 100){//questoes do tipo 41,  primeira etapa.
            $part2 = split('"', $part1[1]);
            $part3 = split('"', $part1[3]);

            $respostaCorreta[$j] = $part2[1];
            $respostaSelecionada[$j] = $part3[1];
             $j++;
          }
          $ids[$contIds] = $idQuestoes;
          $contIds++;
        }
      }
      $score = 0;
      $i = 0;
      while($i < count($respostaSelecionada) and strlen($respostaSelecionada[$i]) < 6){ 
        if($respostaSelecionada[$i] == $respostaCorreta[$i] and $score < 5){
          $score++;
        }
        $i++;
      }
      $scoreAlunos[$x][0] = $nome;
      $scoreAlunos[$x][1] = $score;
      //echo "o aluno $nome acertou $score questoes!<br>";
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
                  ['Nome', 'Score'],";
                  for($i = 0; $i < count($scoreAlunos);$i++){
                     $html.="['".$scoreAlunos[$i][0]."',".$scoreAlunos[$i][1]."],";
                  }
  $html.=" ]);              
                  var optionsAluno = {
                    title: 'Pontuação de cada aluno no quiz'                 
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
<meta charset = "UTF-8"/>
<?php
  $conexao = @mysql_connect('localhost', 'root', '');

  mysql_select_db('francelina-dantas-turma7',$conexao);

  //SELECIONA TODOS OS ALUNOS DA TURMA + SEUS RESPECTIVOS ID's \\
  $sql_turma = 'SELECT SS_USUARIO_TURMA_AULA.idTurma, SS_USUARIO.nome, SS_USUARIO.idUsuario  
                FROM `SS_USUARIO` 
                INNER join `SS_USUARIO_TURMA_AULA` 
                ON SS_USUARIO.idUsuario LIKE SS_USUARIO_TURMA_AULA.idUsuario 
                  WHERE SS_USUARIO_TURMA_AULA.idTurma = 1 AND SS_USUARIO.IdUsuarioTipo = 3';
  $ss_turma = mysql_query($sql_turma) or die ("Erro turma: " . mysql_error());
  
  //Contando as questoes
  $sql_contQ = 'SELECT count(idRecurso) as cont 
                FROM SS_QUESTIONARIO_QUESTAO 
                    WHERE idRecurso LIKE "41"';
  $Nq = mysql_query($sql_contQ) or die ("Erro ".mysql_error());
  $linha = mysql_fetch_object($Nq);
  $Nquestion = $linha->cont;

  $cont = 0;
  $aluno = array(array());
  $questionsTurma = array_fill(0, $Nquestion, 0);
  //$resultado_metrica = [];
  $tempo = [];


  $scoreAlunos = array(array());
  $x = 0;
  while ($linha = mysql_fetch_object($ss_turma)){
      $id = $linha-> idUsuario;
      $nome = $linha-> nome;

      //Selecionando os logs //43 duvidou 4 vezes, 21 duvidou 0 vezes.
      $sql = 'SELECT SS_EVENTO.nome,SS_EVENTO.timestamp, SS_EVENTO.parametros
              FROM SS_EVENTO
              INNER join SS_USUARIO 
              ON  SS_USUARIO.idUsuario LIKE SS_EVENTO.idUsuario

              WHERE SS_USUARIO.idUsuario LIKE '.$id.' and (SS_EVENTO.nome LIKE "assessQuestionSelect" or SS_EVENTO.nome LIKE "assessQuestionAnswer")';
      $resultado = mysql_query($sql) or die ("Erro: " . mysql_error());
      $timestamp =[];
      $parametros = [];
      $i = 0;
      while ($linha = mysql_fetch_object($resultado)){// joga os parametros em um vetor
          $timestamp[$i] = $linha->timestamp;
          $parametros[$i] = $linha->parametros;
        $i++;
      }
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
      echo "o aluno $nome acertou $score questoes!<br>";
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
            <div id='confusaoAluno' style='width: 1000px; height: 1500px;'></div>
            <div id='QuestaoTurma' style='width: 750px; height: 750px;'></div>

          </body>
          </html>";

  echo $html;
?>
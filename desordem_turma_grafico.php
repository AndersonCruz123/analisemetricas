<meta charset = "UTF-8"/>
<?php
  $conexao = @mysql_connect('localhost', 'root', '');
  mysql_select_db('francelina-dantas-turma7',$conexao);

  //SELECIONA TODOS OS ALUNOS DA TURMA + SEUS RESPECTIVOS ID's \\
  $sql_turma = 'SELECT SS_USUARIO_TURMA_AULA.idTurma, SS_USUARIO.nome, SS_USUARIO.idUsuario 
                FROM `SS_USUARIO` 
                INNER join `SS_USUARIO_TURMA_AULA` 
                ON SS_USUARIO.idUsuario LIKE SS_USUARIO_TURMA_AULA.idUsuario 

                  WHERE SS_USUARIO_TURMA_AULA.idTurma = 1';
  $ss_turma = mysql_query($sql_turma) or die ("Erro turma: " . mysql_error());

  //CONTA AS QUESTOES\\
  $sql_contQ =  'SELECT count(idRecurso) as cont FROM SS_QUESTIONARIO_QUESTAO WHERE idRecurso LIKE "41"';
  $Nq = mysql_query($sql_contQ) or die ("Erro ".mysql_error());
  $linha = mysql_fetch_object($Nq);
  $Nquestion = $linha->cont;
  
  $cont = 0;
 $aluno = array(array());

 // $resultado_metrica = [];

  // Calcula a metrica de confusao para cada aluno, e passa o resultado para um vetor;\\
  while ($linha = mysql_fetch_object($ss_turma)){
    $id = $linha-> idUsuario;
    $nome = $linha-> nome;

    $sql = 'SELECT SS_EVENTO.nome,SS_EVENTO.timestamp, SS_EVENTO.parametros
            FROM SS_EVENTO
            INNER join SS_USUARIO 
            ON  SS_USUARIO.idUsuario LIKE SS_EVENTO.idUsuario

            WHERE SS_USUARIO.idUsuario LIKE '.$id.' and (SS_EVENTO.nome LIKE "assessQuestionSelect" or SS_EVENTO.nome LIKE "assessQuestionAnswer")';

    $resultado = mysql_query($sql) or die ("Erro: " . mysql_error());

    $parametros =[];
    $i = 0;
    while ($linha = mysql_fetch_object($resultado)){// joga os parametros em um vetor
        $parametros[$i] = $linha->parametros;
      $i++;
    }
    
    // Exemplo de parametros:
    // 1 - {"mQuestionId":180,"mQuestionnaireId":41} escolha de questao
    // or
    // 2 - {"mCorrectAnswer":"[373]","mQuestionnaireId":41,"mSelectedAnswer":"[373]","mQuestionId":180} selecao de alternativa de questao
    
    $idQuestoes = []; //questionsNumber;
    $j = 0;
    //41 - Exercícios Primeira Etapa 22 teste de egajamento
    foreach ($parametros as $action) {
      $part1 = split(':', $action);
      if(count($part1)  == 5){
        $part2 = split('}', $part1[4]);  //  questão respondida;
        $idQuestoes[$j] = $part2[0]; //passa os os numeros das questões para um vetor;
        $j++;
      }
    }

    $questions = array_fill(0, $Nquestion, 1);
    $histogram = array_fill(0, 20, 0);
    $q = [];
    $i = 0;

    //lendo as linhas\\
    foreach ($idQuestoes as $questoes){
      if($questoes > 100){//questoes de primeira etapa
        if(in_array($questoes, $q) == false){ //se não repetiu
          $q[$i] = $questoes;
          $i++;
        }else{ //se repetiu
          for ($j=0; $j < count($q); $j++) { 
            if($q[$j] == $questoes)
              //HISTOGRAM\\
              $questions[$j]++; //conta quantas vezes o aluno repetiu a questao atual
          }                  
        }
      }
    }
    $i=0;
    $questionOrder = [];
    $sizequest = count($idQuestoes) - 1;
      
    while (count($questionOrder) <= $Nquestion && $sizequest >= 0){
        if (in_array($idQuestoes[$sizequest], $questionOrder) == false){ //ordem em que as questoes foram respondidas
          $questionOrder[$i] = $idQuestoes[$sizequest];
          $i++;
        }
        $sizequest--;
    }

    $vetorFinal="";
    for ($i = count($questionOrder)-1; $i>=0 ; $i--) { 
        $vetorFinal += $questionOrder[$i] + ", "; 
    }

    $p1 = 0;
    $p2 = 0;
    for ($i = count($questionOrder)-1; $i>0 ; $i--) { 
      $qAtual = $questionOrder[$i];
      $qAnt = $questionOrder[$i-1];
      if($qAtual < $qAnt){ //análise de qual barra do histograma irá ser acrescentada
        $p1++;
      }else{ //usa função abs ' valor absoluto' entre uma tela e outra
        $p2++;
      }
    }

    $sum = $p1 + $p2;
    $np1 = $p1/$sum;
    $np2 = $p2/$sum;
    $logp1 = log($np1);
    $logp2 = log($np2);

    //calculo da entropia
    if($p1 == 0){
        $entropia = -($np2*$logp1);
    }elseif ($p2 == 0) {
        $entropia = -($np1*$logp1);
    }else
        $entropia = -($np1*$logp1) - ($np2*$logp2);

    $aluno[$cont][0] = $nome;
    $des = abs(number_format($entropia, 4, '.', ','));
    $aluno[$cont][1] = $des;
    $cont++;
    
   // echo $nome." teve Entropia = ".$entropia."<br>";    
    //echo "Resultado: ".abs(number_format($entropia, 4, '.', ','));// resultado do calculo da metrica
  }

  //Ordenação dos resultados método bubble sort
  for($i = 0; $i < count($aluno); $i++)
  {
     for($j = 0; $j < count($aluno) - 1; $j++)
     {
       if($aluno[$j][1] < $aluno[$j + 1][1])
       {
         $aux = $aluno[$j][0];
         $aux1 = $aluno[$j][1];

         $aluno[$j][0] = $aluno[$j + 1][0];
         $aluno[$j][1] = $aluno[$j + 1][1];         

         $aluno[$j + 1][0] = $aux;
         $aluno[$j + 1][1] = $aux1;
       }
     }
  }

//  print_r($nome_aluno);
 // print_r($resultado_metrica);
 // echo "<br><br>";

  //GERA GRAFICO COM OS RESULTADOS DA TURMA\\
  $html = "<html>
           <head>
           <script type='text/javascript' src='https://www.gstatic.com/charts/loader.js'></script>
           <script type='text/javascript'>
            google.charts.load('current', {'packages':['corechart']});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {";
  $html = $html." 
                  var dataCategoria = google.visualization.arrayToDataTable([
                  ['Nome', 'Índice de desordem'],";
                  for($i = 0; $i < count($aluno);$i++){
                     $html.="['".$aluno[$i][0]."',".$aluno[$i][1]."],";
                  }
  $html.=" ]);              
                  var optionsCategoria = {
                    title: 'Nivel de Desordem por Aluno'
                  
                  };

                  var chartCategoria = new google.visualization.BarChart(document.getElementById('Nome'));

                  chartCategoria.draw(dataCategoria, optionsCategoria);
              }
          </script>
          </head>
          <body>
            <div id='Nome' style='width: 1000px; height: 1500px;'></div>
          </body>
          </html>";

  echo $html;
?>
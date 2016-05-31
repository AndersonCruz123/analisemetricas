<meta charset = "UTF-8"/>
<?php
  $id =$_GET['id'];
  $conexao = @mysql_connect('localhost', 'root', '');

  mysql_select_db('francelina-dantas-turma7',$conexao);
  //Contando as questoes

  $sql_contQ =  'SELECT count(idRecurso) as cont FROM SS_QUESTIONARIO_QUESTAO WHERE idRecurso LIKE "41"';

  $Nq = mysql_query($sql_contQ) or die ("Erro ".mysql_error());
  $linha = mysql_fetch_object($Nq);
  $Nquestion = $linha->cont;
  //echo $Nquestion

  //Selecionando os logs //43 duvidou 4 vezes, 21 duvidou 0 vezes.
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
      if (in_array($idQuestoes[$sizequest], $questionOrder) == false){ //ordem dem que as questoes foram respondidas
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

  echo "<h4>";
  echo "<br>QuestionsNumber: ";
  print_r($idQuestoes);
  echo "<br>questionOrder";
  print_r($questionOrder);
  echo "<br>Histogram: ";
  print_r($questions);
  echo "</h4>";

  echo "<br>Nº questoes: ".$Nquestion."<br>";

  echo "Entropia: ".$entropia;
  
  //echo "Resultado: ".abs(number_format($entropia, 4, '.', ','));// resultado do calculo da metrica
?>
<meta charset = "UTF-8"/>
<?php
//  
  $conexao = @mysql_connect('localhost', 'root', '');

  mysql_select_db('francelina-dantas-turma7',$conexao);
    
  $sql_turma = 'SELECT SS_USUARIO_TURMA_AULA.idTurma, SS_USUARIO.nome, SS_USUARIO.idUsuario 
                FROM `SS_USUARIO` 
                INNER join `SS_USUARIO_TURMA_AULA` 
                ON SS_USUARIO.idUsuario LIKE SS_USUARIO_TURMA_AULA.idUsuario 

                  WHERE SS_USUARIO_TURMA_AULA.idTurma = 1 AND SS_USUARIO_TURMA_AULA.IdUsuarioTipo = 3';

  $ss_turma = mysql_query($sql_turma) or die ("Erro turma: " . mysql_error());
  while ($linha = mysql_fetch_object($ss_turma)){// joga os parametros em um vetor
        calcula_confusao_turma($linha-> idUsuario, $linha-> nome);
    }
  $id = 500;
  function calcula_confusao_turma($idAluno, $nome){
      //Contando as questoes
      $id = $idAluno;
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
      
      //exemplo de parametro tipo:
      // 1 - {"mQuestionId":180,"mQuestionnaireId":41} escolha de questao
      // or
      // 2 - {"mCorrectAnswer":"[373]","mQuestionnaireId":41,"mSelectedAnswer":"[373]","mQuestionId":180} selecao de alternativa de questao
      
      $idQuestoes = [];
      $j = 0;

      foreach ($parametros as $action) { //41 - Exercícios Primeira Etapa 22 teste de egajamento
        $part1 = split(':', $action);
        /*if (count($part1) == 3){ // verifica o tipo de parametro atraves do tamanho;
          $part2 = split(',"', $part1[1]); //separa o parametro relacionados ao numero da questão;
          $idQuestoes[$j] = $part2[0]; //passa os os numeros das questões para um vetor;
          $j++;
        }else{*/
        if(count($part1)  == 5){
          $part2 = split('}', $part1[4]);  //  questão respondida;
          $idQuestoes[$j] = $part2[0]; //passa os os numeros das questões para um vetor;
          $j++;
        }
      }

      $questions = array_fill(0, $Nquestion, 1);
      $q = [];
      $i = 0;
      //lendo as linhas\\
      foreach ($idQuestoes as $questoes){
        if($questoes > 100){
          if(in_array($questoes, $q) == false){ //se não repetiu
            $q[$i] = $questoes;
            $i++;
          }else{ //se repetiu
            for ($j=0; $j < count($q); $j++) { 
              if($q[$j] == $questoes)
                $questions[$j]++; //conta as repetições
            }                  
          }
        }
      }
      
       $duvida = 0;
       $sum=0;
     
        //CALCULO DA METRICA
        for( $i=0;$i<$Nquestion;$i++){
            $sum = $sum+$questions[$i];
        }
        $questionsN = [];
        for($i=0;$i<$Nquestion;$i++){
          $questionsN[$i]=$questions[$i]/$sum;
        }
        $questionsLog = [];
        for($i=0;$i<$Nquestion;$i++){
            $questionsLog[$i]=$questionsN[$i]*log($questionsN[$i]);
        }
        for($i=0;$i<$Nquestion;$i++){
            $duvida=$duvida-$questionsLog[$i];
        }

        $duvida = 1-($duvida/ log($Nquestion));

        echo "<br><br>Aluno: ".$nome."<br>";

        echo "Questions: ";
        print_r($questions);
        echo "<br>";

        echo "Nº Questoes: ".$Nquestion."<br>";
        
        echo "Resultado: ".abs(number_format($duvida, 4, '.', ','));// resultado do calculo da metrica
  }
?>
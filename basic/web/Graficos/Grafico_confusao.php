<meta charset = "UTF-8"/>
<title>Gráfico Confusão Turma</title>
<?php
  try{
      #Conexão com MySQL via PDO_MYSQL
      $DBH = new PDO("mysql:host=localhost;dbname=francelina-dantas-turma7", "smarcos", "password");
  }catch (PDOException $e) { 
      echo $e->getMessage();
  }

  //$conexao = @mysql_connect('localhost', 'root', '');

  //mysql_select_db('francelina-dantas-turma7',$conexao);

  //SELECIONA TODOS OS ALUNOS DA TURMA + SEUS RESPECTIVOS ID's \\
  //$sql_turma
  $ss_turma = $DBH->query("SELECT SS_USUARIO_TURMA_AULA.idTurma, SS_USUARIO.nome, SS_USUARIO.idUsuario FROM `SS_USUARIO` INNER join `SS_USUARIO_TURMA_AULA` ON SS_USUARIO.idUsuario LIKE SS_USUARIO_TURMA_AULA.idUsuario WHERE SS_USUARIO_TURMA_AULA.idTurma = 1 AND SS_USUARIO.IdUsuarioTipo = 3") or die ("Error: ".$ss_turma->errorInfo());

  //$ss_turma = mysql_query($sql_turma) or die ("Erro turma: " . mysql_error());
  
  //Contando as questoes
  $sql_contQ = $DBH->query('SELECT count(idRecurso) as cont 
                FROM SS_QUESTIONARIO_QUESTAO 
                    WHERE idRecurso LIKE "41"') or die ("Error: ".$sql_contQ);
  //$Nq = mysql_query($sql_contQ) or die ("Erro ".mysql_error());
  $linha = $sql_contQ->fetch(PDO::FETCH_OBJ);//mysql_fetch_object($Nq);
  $Nquestion = $linha->cont;

  $cont = 0;
  $aluno = array(array());
  $questionsTurma = array_fill(0, $Nquestion, 0);
  //$resultado_metrica = [];

  // Calcula a metrica de confusao para cada aluno, e passa o resultado para um vetor;\\
  while ($linha = $ss_turma->fetch(PDO::FETCH_OBJ)){
      $id = $linha-> idUsuario;
      $nome = $linha-> nome;

      //Selecionando os logs //43 duvidou 4 vezes, 21 duvidou 0 vezes.
      $resultado = $DBH->query('SELECT SS_EVENTO.nome,SS_EVENTO.timestamp, SS_EVENTO.parametros
              FROM SS_EVENTO
              INNER join SS_USUARIO 
              ON  SS_USUARIO.idUsuario LIKE SS_EVENTO.idUsuario

              WHERE SS_USUARIO.idUsuario LIKE '.$id.' and (SS_EVENTO.nome LIKE "assessQuestionSelect" or SS_EVENTO.nome LIKE "assessQuestionAnswer")') or die("Error: ".$resultado);
      //$resultado = mysql_query($sql) or die ("Erro: " . mysql_error());
      $parametros =[];
      $i = 0;
      while ($linha = $resultado->fetch(PDO::FETCH_OBJ)){// joga os parametros em um vetor
          $parametros[$i] = $linha->parametros;
        $i++;
      }
      
      //exemplo de parametro tipo:
      // 1 - {"mQuestionId":180,"mQuestionnaireId":41} escolha de questao
      // or
      // 2 - {"mCorrectAnswer":"[373]","mQuestionnaireId":41,"mSelectedAnswer":"[373]","mQuestionId":180} selecao de alternativa de questao
      
      $idQuestoes = [];
      $j = 0;
      foreach ($parametros as $action) {

       $part1 = explode(':', $action);
        if(count($part1)  == 5){ //Tamanho do tipo 2;
          $part2 = explode('}', $part1[4]);  //  questão respondida;
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
            $q[$i] = $questoes; //acrescenta a questao no vetor
            $i++;
          }else{ //se repetiu
            for ($j=0; $j < count($q); $j++) { 
              if($q[$j] == $questoes)
                $questions[$j]++; //conta as repetições
   //         	$questionsTurma[$j]++;
            }                  
          }
        }
      }
     
        //CALCULO DA METRICA
      $duvida = 0;
      $sum=0;
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

      //echo "<br><br>Aluno: ".$nome."<br>";
      $aluno[$cont][0] = $nome;
  //    echo $nome." ";
   //   print_r($questions);
     // echo " ".$duv."</br>";
      for($i=0; $i<count($questionsTurma); $i++){
      	$questionsTurma[$i] = $questionsTurma[$i] + $questions[$i];
      }
      //echo "<br>";

      //echo "Nº Questoes: ".$Nquestion."<br>";
      $duv = abs(number_format($duvida, 4, '.', ','));

      //echo "Resultado: ".abs(number_format($duvida, 4, '.', ','));// resultado do calculo da metrica
      $aluno[$cont][1] = $duv;
      $cont++;
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

  //rsort($questionsTurma);
  //print_r($nome_aluno);
  //print_r($resultado_metrica);
  //echo "<br><br>";

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
                  ['Nome', 'Indice de confusão'],";
                  for($i = 0; $i < count($aluno);$i++){
                     $html.="['".$aluno[$i][0]."',".$aluno[$i][1]."],";
                  }
  $html.=" ]);              
                  var optionsAluno = {
                    title: 'Nível de Confusão por Aluno'                 
                  };

                  var chartConfusaoAluno = new google.visualization.BarChart(document.getElementById('confusaoAluno'));
                  chartConfusaoAluno.draw(dataConfusaoAluno, optionsAluno);


                  var dataQuestaoTurma = google.visualization.arrayToDataTable([
                  ['Questão', 'Quantidade'],";
                  for($i = 0; $i < count($questionsTurma);$i++){
                     $html.="['".$i."',".$questionsTurma[$i]."],";
                  }
  $html.=" ]);              
                  var optionsQuestaoTurma = {
                    title: 'Quantidade de questão respondida pelos alunos'
                  };

                  var chartQuestaoTurma = new google.visualization.BarChart(document.getElementById('QuestaoTurma'));
                  chartQuestaoTurma.draw(dataQuestaoTurma, optionsQuestaoTurma);

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

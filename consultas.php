<meta charset = "UTF-8"/>
<?php


  $conexao = @mysql_connect('localhost', 'root', '');
  mysql_select_db('francelina-dantas-turma7',$conexao);

  function ss_turma(){ //RETORNA OS ALUNOS DA TURMA 1
  	$sql_turma = 'SELECT SS_USUARIO_TURMA_AULA.idTurma, SS_USUARIO.nome, SS_USUARIO.idUsuario 
                  FROM `SS_USUARIO` 
                  INNER join `SS_USUARIO_TURMA_AULA` 
                  ON SS_USUARIO.idUsuario LIKE SS_USUARIO_TURMA_AULA.idUsuario 

                  WHERE SS_USUARIO_TURMA_AULA.idTurma = 1 AND SS_USUARIO.IdUsuarioTipo = 3';

  	$ss_turma = mysql_query($sql_turma) or die ("Erro turma: " . mysql_error());

  	$aluno = array(array());
  	$i = 0;
  	while ($linha = mysql_fetch_object($ss_turma)){
    	$aluno[$i][0] = $linha-> idUsuario;
    	$aluno[$i][1] = $linha-> nome;
    	//$aluno[$i][0]."|".$aluno[$i][1]."<br>";
    	$i++;

    }
    return $aluno;
  }
  function ss_turma_professor(){ //RETORNA O PROFESSOR DA TURMA 1;
  	$sql_turma = 'SELECT SS_USUARIO_TURMA_AULA.idTurma, SS_USUARIO.nome, SS_USUARIO.idUsuario 
                  FROM `SS_USUARIO` 
                  INNER join `SS_USUARIO_TURMA_AULA` 
                  ON SS_USUARIO.idUsuario LIKE SS_USUARIO_TURMA_AULA.idUsuario 

                  WHERE SS_USUARIO_TURMA_AULA.idTurma = 1 AND SS_USUARIO.IdUsuarioTipo = 2';

  	$ss_turma = mysql_query($sql_turma) or die ("Erro turma: " . mysql_error());
  	
  	$aluno = array(array());
  	$i = 0;
  	while ($linha = mysql_fetch_object($ss_turma)){
    	$aluno[$i][0] = $linha-> idUsuario;
    	$aluno[$i][1] = $linha-> nome;
    	$i++;
    }
    return $aluno;
  }

  function nQuestion(){ //RETORNA O NUMERO DE QUESTOES DE PRIMEIRA ETAPA;
  	$sql_contQ =  'SELECT count(idRecurso) as cont FROM SS_QUESTIONARIO_QUESTAO WHERE idRecurso LIKE "41"';
  	$Nq = mysql_query($sql_contQ) or die ("Erro ".mysql_error());
  	$linha = mysql_fetch_object($Nq);
  	return $linha->cont;
  }

  function parametros($id){   	//SELECIONA OS PARAMETROS NECESSARIOS PARA O CALCULO DA METRICA E OS RETORNA;
    $sql = 'SELECT SS_EVENTO.nome,SS_EVENTO.timestamp, SS_EVENTO.parametros
            FROM SS_EVENTO
            INNER join SS_USUARIO 
            ON  SS_USUARIO.idUsuario LIKE SS_EVENTO.idUsuario

            WHERE SS_USUARIO.idUsuario LIKE '.$id.' and (SS_EVENTO.nome LIKE "assessQuestionSelect" or SS_EVENTO.nome LIKE "assessQuestionAnswer")';

    $resultado = mysql_query($sql) or die ("Erro: " . mysql_error());

    $parametros =[];
    $i = 0;
    while ($linha = mysql_fetch_object($resultado)){//
        $parametros[$i] = $linha->parametros;
      	echo $parametros[$i]."<br>";
      	$i++;
    }
    return $parametros;
  }
  	$i = 0;
	while($i < count(ss_turma())){
		echo "<h3>Aluno: ".ss_turma()[$i][1]."</h3>";
		parametros(ss_turma()[$i][0]);
		echo "<br>";
		$i++;
	}
?>
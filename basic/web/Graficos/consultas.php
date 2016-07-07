<meta charset = "UTF-8"/>
<?php
  try{
      #Conexão com MySQL via PDO_MYSQL
      $DBH = new PDO("mysql:host=localhost;dbname=francelina-dantas-turma7", "smarcos", "password");
  }catch (PDOException $e) { 
      echo $e->getMessage();
  }
  //$conexao = @mysql_connect('localhost', 'root', '');
  //mysql_select_db('francelina-dantas-turma7',$conexao);

  function ss_turma(){ //RETORNA OS ALUNOS DA TURMA 1
      try{
      #Conexão com MySQL via PDO_MYSQL
        $DBH = new PDO("mysql:host=localhost;dbname=francelina-dantas-turma7", "smarcos", "password");
      }catch (PDOException $e) { 
        echo $e->getMessage();
      }
  	 $ss_turma = $DBH->query("SELECT SS_USUARIO_TURMA_AULA.idTurma, SS_USUARIO.nome, SS_USUARIO.idUsuario FROM `SS_USUARIO` INNER join `SS_USUARIO_TURMA_AULA` ON SS_USUARIO.idUsuario LIKE SS_USUARIO_TURMA_AULA.idUsuario WHERE SS_USUARIO_TURMA_AULA.idTurma = 1 AND SS_USUARIO.IdUsuarioTipo = 3") or die ("Error: ".$ss_turma->errorInfo());

  	//$ss_turma = mysql_query($sql_turma) or die ("Erro turma: " . mysql_error());

  	$aluno = array(array());
  	$i = 0;
  	while ($linha = $ss_turma->fetch(PDO::FETCH_OBJ)){
    	$aluno[$i][0] = $linha-> idUsuario;
    	$aluno[$i][1] = $linha-> nome;
    	//$aluno[$i][0]."|".$aluno[$i][1]."<br>";
    	$i++;

    }
    return $aluno;
  }
  function ss_turma_professor(){ //RETORNA O PROFESSOR DA TURMA 1;
  	$ss_turma = $DBH->query("SELECT SS_USUARIO_TURMA_AULA.idTurma, SS_USUARIO.nome, SS_USUARIO.idUsuario FROM `SS_USUARIO` INNER join `SS_USUARIO_TURMA_AULA` ON SS_USUARIO.idUsuario LIKE SS_USUARIO_TURMA_AULA.idUsuario WHERE SS_USUARIO_TURMA_AULA.idTurma = 1 AND SS_USUARIO.IdUsuarioTipo = 2") or die ("Error: ".$ss_turma->errorInfo());

  	//$ss_turma = mysql_query($sql_turma) or die ("Erro turma: " . mysql_error());
  	
  	$aluno = array(array());
  	$i = 0;
  	while ($linha = $ss_turma->fetch(PDO::FETCH_OBJ)){
    	$aluno[$i][0] = $linha-> idUsuario;
    	$aluno[$i][1] = $linha-> nome;
    	$i++;
    }
    return $aluno;
  }

  function nQuestion(){ //RETORNA O NUMERO DE QUESTOES DE PRIMEIRA ETAPA;
  	$sql_contQ = $DBH->query('SELECT count(idRecurso) as cont 
                FROM SS_QUESTIONARIO_QUESTAO 
                    WHERE idRecurso LIKE "41"') or die ("Error: ".$sql_contQ);
    //$Nq = mysql_query($sql_contQ) or die ("Erro ".mysql_error());
    $linha = $sql_contQ->fetch(PDO::FETCH_OBJ);//mysql_fetch_object($Nq);
  	return $linha->cont;
  }

  function parametros($id){   	//SELECIONA OS PARAMETROS NECESSARIOS PARA O CALCULO DA METRICA E OS RETORNA;
    try{
      #Conexão com MySQL via PDO_MYSQL
        $DBH = new PDO("mysql:host=localhost;dbname=francelina-dantas-turma7", "smarcos", "password");
      }catch (PDOException $e) { 
        echo $e->getMessage();
      }

    $resultado = $DBH->query('SELECT SS_EVENTO.nome,SS_EVENTO.timestamp, SS_EVENTO.parametros
              FROM SS_EVENTO
              INNER join SS_USUARIO 
              ON  SS_USUARIO.idUsuario LIKE SS_EVENTO.idUsuario

              WHERE SS_USUARIO.idUsuario LIKE '.$id.' and (SS_EVENTO.nome LIKE "assessQuestionSelect" or SS_EVENTO.nome LIKE "assessQuestionAnswer")') or die("Error: ".$resultado);

    //$resultado = mysql_query($sql) or die ("Erro: " . mysql_error());

    $parametros =[];
    $i = 0;
    while ($linha = $resultado->fetch(PDO::FETCH_OBJ)){//
        $parametros[$i] = $linha->parametros;
      	$i++;
    }
    return $parametros;
  }
  function timestamp($id){
    try{
      #Conexão com MySQL via PDO_MYSQL
        $DBH = new PDO("mysql:host=localhost;dbname=francelina-dantas-turma7", "smarcos", "password");
      }catch (PDOException $e) { 
        echo $e->getMessage();
      }

    $resultado = $DBH->query('SELECT SS_EVENTO.nome,SS_EVENTO.timestamp, SS_EVENTO.parametros
              FROM SS_EVENTO
              INNER join SS_USUARIO 
              ON  SS_USUARIO.idUsuario LIKE SS_EVENTO.idUsuario

              WHERE SS_USUARIO.idUsuario LIKE '.$id.' and (SS_EVENTO.nome LIKE "assessQuestionSelect" or SS_EVENTO.nome LIKE "assessQuestionAnswer")') or die("Error: ".$resultado);

    //$resultado = mysql_query($sql) or die ("Erro: " . mysql_error());

    $timestamp =[];
    $parametros = [];
    $i = 0;

    $linha = $resultado->fetch(PDO::FETCH_OBJ);
    $tamanho = $resultado->rowCount();
    do{
      if($tamanho > 0){//resultado not null
        $parametros[$i] = $linha->parametros;
        $part1 = explode(':', $parametros[$i]);
        if(count($part1)  == 5)
            $part2 = explode(',', $part1[2]);
        if(count($part1)  == 3)
            $part2 = explode('}', $part1[2]);
        if($part2[0] == 41){
           $timestamp[$i] = $linha->timestamp;
          $i++;
        }
      }else{
        $timestamp[$i] = 0; 
        $i++;
      }
    }while ($linha = $resultado->fetch(PDO::FETCH_OBJ));
    return $timestamp;
  }
  function timestamp_question($id){
    try{
      #Conexão com MySQL via PDO_MYSQL
        $DBH = new PDO("mysql:host=localhost;dbname=francelina-dantas-turma7", "smarcos", "password");
      }catch (PDOException $e) { 
        echo $e->getMessage();
      }
    $resultado = $DBH->query('SELECT SS_EVENTO.nome,SS_EVENTO.timestamp, SS_EVENTO.parametros
              FROM SS_EVENTO
              INNER join SS_USUARIO 
              ON  SS_USUARIO.idUsuario LIKE SS_EVENTO.idUsuario

              WHERE SS_USUARIO.idUsuario LIKE '.$id.' and (SS_EVENTO.nome LIKE "assessQuestionSelect" or SS_EVENTO.nome LIKE "assessQuestionAnswer")') or die("Error: ".$resultado);

    //$resultado = mysql_query($sql) or die ("Erro: " . mysql_error());

    $timestamp =[];
    $parametros = [];
    $i = 0;
    $linha = $resultado->fetch(PDO::FETCH_OBJ);
    $tamanho = $resultado->rowCount();
    //PEGANDO O TEMPO DO QUESTIONARIO UM, ID = 41 OBS: para mudar o questionario, basta mudar o id\\
    do{
      if($tamanho > 0){//resultados not null;
        $parametros[$i] = $linha->parametros;
        $part1 = explode(':', $parametros[$i]);
        if(count($part1)  == 5)
            $part2 = explode(',', $part1[2]);
        if(count($part1)  == 3)
            $part2 = explode('}', $part1[2]);
        if($part2[0] == 41){
           $timestamp[$i] = $linha->timestamp;
          $i++;
        }
      }else{
        $timestamp[$i] = 0; 
        $i++;
      }
    }while ($linha = $resultado->fetch(PDO::FETCH_OBJ));
    //\\
    $i = 0;
    $j = 0;
    $dados = array(array());
    foreach ($parametros as $param){
      $part1 = explode(":", $param);
      if(count($part1) == 5){
        $part1 = explode("}", $part1[4]);
        if($i < count($timestamp)){  //calcula o intervalo entre as questões respondidas;
          $dados[$j][0] = intervalo($timestamp[$i-1], $timestamp[$i]);
          $dados[$j][1] = $part1[0];
        }
        $j++;
      }
      $i++;
    }
    return $dados;
  }
  function intervalo($timestamp1, $timestamp2){
    $data_final = date("d-m-Y G:i:s", $timestamp2 );
    $data_inicial = date("d-m-Y G:i:s", $timestamp1);
    $data_final = strtotime($data_final);
    $data_inicial = strtotime($data_inicial);
    $diferenca = $data_final - $data_inicial;

    $minutos = $diferenca;// / 60;
    return $minutos;
  }
?>
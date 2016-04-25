<?php
	$conexao = @mysql_connect('localhost', 'root', '');
	
	mysql_select_db('2',$conexao);
  
	$sql="select * from ALUNOS";
	$resultado = mysql_query($sql) or die ("Error: " . mysql_error());
  
	// Obtém o resultado de uma linha como um objeto
	while($linha = mysql_fetch_object($resultado))
		echo "Nome: <h3>".$linha->nome."</h3><br> Data De Nascimento: <h3>".$linha->data."</h3><br>";
	
	mysql_close($conexao);
?>

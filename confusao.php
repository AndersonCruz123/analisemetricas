<meta charset = "UTF-8"/>
<?
  $arquivo =$_GET['id'];
  //$arquivo = '/opt/lampp/htdocs/metricas/BaseDados/Anderson_2015_6_29_13_25_24_DataTouch.csv';
 	$NQuestion = 20;
  $duvida = 0;
  $sum=0;
  $questions = array_fill(0, 20, 0.0); //vetor de vezes em que o aluno respondeu uma questão;
  $fp = fopen($arquivo, "r"); // abri arquivo
  $cont = 0;
  
  $cabecario = fgetcsv($fp, 0, ";"); //passando o duplo cabecario
  $cabecario2 = fgetcsv($fp, 0, ";");

    //script sql

  while(($dados_csv = fgetcsv($fp, 0, ";")) !== FALSE){ //lendo as linhas
   	$dados_linha = explode(',', $dados_csv[0]); //dividindo as linhas do csv
   	if (($dados_linha[0] !== "Back") && ($dados_linha[0] !== "Next")){ //verificando se o aluno respondeu uma questão
   			$question = $dados_linha[2];
   			$questions[$question - 1] += 1; //contando quantas vezes o aluno respondeu a questão atual.
   	}
	}
	fclose($fp);
	/*$qst = 1;
	  foreach ($questions as $value) {
    	echo "Questão de numero ".$qst." foi Repondida: ".$value." vezes. <br>";
    	$qst++;
    }*/
    print_r($questions);
    echo "<br>";
    //CALCULO DA METRICA
    for( $i=0;$i<$NQuestion;$i++){
        $sum = $sum+$questions[$i];
    }
    $questionsN = [];
    for($i=0;$i<$NQuestion;$i++){
    	$questionsN[$i]=$questions[$i]/$sum;
    }
  	$questionsLog = [];
    for($i=0;$i<$NQuestion;$i++){
        $questionsLog[$i]=$questionsN[$i]*log($questionsN[$i]);
    }
    for($i=0;$i<$NQuestion;$i++){
        $duvida=$duvida-$questionsLog[$i];
    }
   	$duvida = 1-($duvida/ Log($NQuestion));
   	
   	echo $duvida;// resultado do calculo da metrica
?>
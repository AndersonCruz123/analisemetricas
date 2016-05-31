<?php
    $arquivo =$_GET['id'];
	//$arquivo = 'BaseDados/C.R.V.G_2015_6_29_13_40_34_DataTouch.csv';
 	$NQuestion = 20;
    $duvida = 0;
    $sum=0;
    $entropia=0;
    $questionsNumber = array_fill(0, 20, 0);
    $questionOrder = [];
  	$histogram = array_fill(0, 20, 0);
  	$sizequest = count($questionsNumber);


  	$fp = fopen($arquivo, "r"); // abre arquivo
  	$cont = 0;

  	$cabecario = fgetcsv($fp, 0, ";"); //passando o duplo cabecario
  	$cabecario2 = fgetcsv($fp, 0, ";");
  	$i = 0;
  	while(($dados_csv = fgetcsv($fp, 0, ";")) !== FALSE){ //lendo as linhas
    	$dados_linha = explode(',', $dados_csv[0]); //dividindo as linhas do csv
    	if (($dados_linha[0] !== "Back") && ($dados_linha[0] !== "Next")){ //verificando se o aluno respondeu uma questão
    			$questionsNumber[$i] = $dados_linha[2];
    			$question = $dados_linha[2];
    			$histogram[$question - 1] += 1;
    			$i++;
                /*echo "<h3>";
                echo "<br> I: ".$i;
                echo "<br>QuestionsNumber: ";
                print_r($questionsNumber);
                echo "<br>question: ";
                print_r($question);
                echo "<br>histogram: ";
                print_r($histogram);
                echo "</h3>";*/
    	}
    }
    $i=0;
    $sizequest = count($questionsNumber)-1;
    
    while (count($questionOrder) <= $NQuestion && $sizequest >= 0){
    	if (in_array($questionsNumber[$sizequest], $questionOrder) == false){ //
    		$questionOrder[$i] = $questionsNumber[$sizequest];
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
    print_r($questionsNumber);
    echo "<br>questionOrder";
    print_r($questionOrder);
    echo "<br>Question: ";
    print_r($question);
    echo "<br>Histogram: ";
    print_r($histogram);
    echo "</h4>";
    
    echo "Entropia: ".$entropia;

?>
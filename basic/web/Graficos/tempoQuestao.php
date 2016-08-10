<meta charset = "UTF-8"/>
<?php
    include 'consultas.php';
    $x=0;
    $nome = [];

    while($x < count(ss_turma())){ //pega o id de todos os alunos
        $id = ss_turma()[$x][0];
        $nome[$x] = ss_turma()[$x][1];

        $tempo = [];
        $questoes = [];
        $novotempo= array(500); #posições: 0 = q1, 1 = q2...

        //echo "<br>id: ".$id." Grafico_confusaonome: ".$nome[$x]."<br>";
        $alunoAtual = timestamp_question($id);
        //print_r($alunoAtual);
        for($i = 0; $i < count($alunoAtual); $i++){
            $tempo[$i] = $alunoAtual[$i][0];
            $questoes[$i] = $alunoAtual[$i][1];
        }

        if(count($tempo) > 0 && count($questoes) > 0){
            $j = 0;
            $objcompare = $questoes[$j];
            echo "<br>".$objcompare."<br>";

            while($j < count($questoes)) {
                for ($i = 0; $i < count($questoes); $i++) {
                    if($objcompare == $questoes[$i]){
                        $novotempo[$j] += $tempo[$i];
                    }
                }
                $j++;
                $objcompare = $questoes[$j];
                echo "<br>".$objcompare."<br>";
            }
        }

        $x++;
        echo "<br>novo tempo<br>";
        print_r($novotempo);
        echo "<br> questoes <br>";
        print_r($questoes);
        echo "<br> tempo normal <br>";
        print_r($tempo);
  }

  
 ?>
}
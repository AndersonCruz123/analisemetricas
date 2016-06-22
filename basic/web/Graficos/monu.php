 <?php
  	$data_final = date("d-m-Y G:i:s", 1446745567 );
    $data_inicial = date("d-m-Y G:i:s", 1446748683);
    $data_final = strtotime($data_final);
    $data_inicial = strtotime($data_inicial);
    $diferenca = $data_final - $data_inicial;

    $minutos = floor($diferenca / 60);

  //  $tempoAlunos[$x] = $minutos;
   //$nomes[$x] = $nome;
    echo "$minutos <br>";
?>
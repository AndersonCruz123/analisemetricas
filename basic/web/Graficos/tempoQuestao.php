<meta charset = "UTF-8"/>
<?php
  include 'consultas.php';
  $x=0;
  $nome = [];
  while($x < count(ss_turma())){ //pega o id de todos os alunos
      $id = ss_turma()[$x][0];
      $nome[$x] = ss_turma()[$x][1];
      $x++;
  }
  
 ?>
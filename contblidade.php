<?php

function getirs($salario)
{
  // code...
      include 'connections/conn.php';

  $row = mysqli_fetch_array(mysqli_query($conn,"SELECT funcionario_desconto FROM irs as i where '$salario' <= (Select escalao from irs WHERE i.id_irs = irs.id_irs)"));
      include 'connections/diconn.php';

  $total = ($row['funcionario_desconto'] * $salario)/100;

  return $total;

}
function getss($salario)
{
  // code...
      include 'connections/conn.php';

  $row = mysqli_fetch_array(mysqli_query($conn,"SELECT funcionario_desconto FROM ss as s where '$salario' <= (Select escalao from ss WHERE s.id_ss = ss.id_ss)"));
      include 'connections/diconn.php';

  $total = ($row['funcionario_desconto'] * $salario)/100;

  return $total;

}

function salbruto($salario,$turno,$id)
{
  // code...
      include 'connections/conn.php';

  $row = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM funcionarios where id_funcionario ='$id' "));

  if($turno == '1'){

    $extra = ($row['func_salario'] * 1)/100;
    $total = $row['func_salario'] + $extra;

  }
  if($turno == '2'){

    $extra = ($row['func_salario'] * 1.5)/100;
    $total = $row['func_salario'] + $extra;

  }
  if($turno == '3'){

    $extra = ($row['func_salario'] * 3)/100;
    $total = $row['func_salario'] + $extra;

  }

  if($turno == '4'){


    $total = $row['func_salario'];

  }


      include 'connections/diconn.php';


  return $total;

}

 ?>

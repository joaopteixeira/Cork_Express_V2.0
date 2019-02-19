<?php


$funcnif = $_REQUEST['func_nif'];

include 'connections/conn.php';

$catprf = mysqli_query($conn,"SELECT * from recibos WHERE nif_funcionario = $func_nif");

while ($row = mysqli_fetch_array($catprf)) {


  echo "<label>NIB</label><input type=\"text\" class=\"form-control\" value=\"$row[id_recibo]\" disabled>";
  echo "<label>NIF</label><input type=\"text\" class=\"form-control\" value=\"$row[ano]\" disabled>";
  echo "<label>NISS</label><input type=\"text\" class=\"form-control\" value=\"$row[mes]\" disabled>";


}

include 'connections/diconn.php';

 ?>

<?php

require_once 'contblidade.php';
$functur = $_REQUEST['turno'];
$id = $_REQUEST['id'];

include 'connections/conn.php';

$dados = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM funcionarios where id_funcionario ='$id' "));
$bruto = salbruto($dados['func_salario'],$functur,$dados['id_funcionario']);
$ss = getss($bruto);
$irs = getirs($bruto);
$liquido = $bruto-$ss-$irs;

if($functur == '1'){$turno_mensal="1%";}
else if($functur == '2'){$turno_mensal="1.5%";}
else if($functur == '3'){$turno_mensal="3%";}
else if($functur == '4'){$turno_mensal="0%";}



  echo '<div class="row">
      <div class="col-md-6">
        <div class="form-group">
            <label>Desconto Segurança Social</label>
            <input type="text" value= "'.$ss.'€" max="21" name="dss" class="form-control" readonly>
        </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
            <label>Desconto IRS</label>
            <input type="text" value="'.$irs.'€" max="21" name="dirs" class="form-control" readonly>
        </div>

      </div>
</div>';
echo '<div class="row">
    <div class="col-md-6">
      <div class="form-group">
          <label>Subsidio Turno</label>
          <input type="text" value= "'.($bruto-$dados['func_salario']).'€" max="21" name="subsidio_turno" class="form-control" readonly>
      </div>
      </div>
      <div class="col-md-6">
      <div class="form-group">
          <label>Subsidio Turno (%)</label>
          <input type="text" value="'.$turno_mensal.'" max="21" name="turno_mensal_perc" class="form-control" readonly>
      </div>

    </div>
</div>';
echo '<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Valor Liquido</label>
            <input type="text" value="'.$liquido.'€" name="valor_liquido" placeholder="Introduza o seu niss" max="12" class="form-control" readonly>
        </div>
    </div>
    <!--/span-->
    <div class="col-md-6">
        <div class="form-group">
            <label>Valor Bruto</label>
            <input type="text" value="'.$bruto.'€" name="valor_bruto" placeholder="Introduza o seu nib" max="21" class="form-control" readonly>
        </div>
    </div>
    <!--/span-->
</div>';




include 'connections/diconn.php';

 ?>

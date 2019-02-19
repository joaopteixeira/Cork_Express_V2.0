
<?php
  if(!@$_POST['ano'] && !@$_POST['mes']){
    if(!@$_SESSION['userid']){
      echo'<meta http-equiv="refresh" content="0;url=/indexadmin.php"';
    }else{
      echo'<meta http-equiv="refresh" content="0;url=/indexuser.php?an=5&page=notfound"';
    }
  }else{
    include 'connections/conn.php';
    $row = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM recibos WHERE ano='$_POST[ano]' AND mes='$_POST[mes]' AND id_funcionario='$_SESSION[userid]'"));

    if(!$row){
      echo'<meta http-equiv="refresh" content="0;url=/indexuser.php?an=5&page=notfound&ano='.$_POST['ano'].'&mes='.$_POST['mes'].'"';
    }

    $func = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM funcionarios WHERE id_funcionario='$_SESSION[userid]'"));
    $cat = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM categoria_profissional WHERE id_categoria='$func[id_categoria]'"));

    include 'connections/diconn.php';
  }

?>

<div class="row">
  <div class="col">
    <div class="card">
        <div class="card-body">
            <div class="row">
          <div class="col">
              <h1><?php echo "$row[nome_funcionario]"; ?></h1>
          </div>


            <div class="col" >
                <h2 style="text-align:right;"><?php require_once 'datas.php'; echo getMesName($_POST['mes']);echo " $_POST[ano]"; ?></h2>
            </div>
          </div>
          <br>
          <div class="table-responsive">
                              <table class="table">
                                  <thead>
                                      <tr>
                                          <th>Data</th>
                                          <th>Categoria Profissional</th>
                                          <th>Nº Beneficiario</th>
                                          <th>Nº Contribuite</th>
                                          <th>Taxa/IRS</th>

                                      </tr>
                                  </thead>
                                  <tbody>
                                      <tr>
                                          <th scope="row">01- <?php echo "$_POST[mes]-$_POST[ano]"; ?></th>
                                          <td><?php echo "$cat[descricao_categoria]"; ?></td>
                                          <td scope="row" ><?php echo "$row[niss_funcionario]"; ?> </td>
                                          <td scope="row" ><?php echo "$row[nif_funcionario]"; ?></td>
                                          <td class="color-primary"><?php echo round(($func['func_salario']/$row['desconto_irc']),0); ?> %</td>
                                      </tr>

                                  </tbody>
                              </table>
                          </div>
            <h4>Salario Base: <?php echo "$func[func_salario]"; ?></h4>



      </div>
    </div>
</div>
</div>
  <div class="row">

      <div class="col">
        <div class="card">
            <div class="card-body">
              </div>
              <div class="table-responsive">
                                  <table class="table">
                                      <thead>
                                          <tr>
                                              <th>Designação</th>
                                              <th>Quant</th>
                                              <th>Valor Unitario</th>
                                              <th>Abonos</th>
                                              <th>%</th>
                                              <th>Descontos</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                          <tr>
                                              <th>Remuneração</th>
                                              <td>176h</td>
                                              <td><?php echo round(($func['func_salario']/176),2) ?></td>
                                              <td><?php echo "$func[func_salario]"; ?> €</td>
                                              <td class="color-primary"></td>
                                              <td></td>
                                          </tr>
                                          <tr>
                                              <th>Subsidio Turno</th>
                                              <td></td>
                                              <td></td>
                                              <td><?php echo "$row[subsidio_turno]"; ?> €</td>
                                              <td class="color-primary"></td>
                                              <td></td>
                                          </tr>
                                          <tr>
                                              <th>Segurança Social</th>
                                              <td><?php echo "$row[valor_bruto]"; ?></td>
                                              <td></td>
                                              <td></td>
                                              <td class="color-primary"><?php echo round(($func['func_salario']/$row['desconto_ss']),0); ?></td>
                                              <td><?php echo $row['desconto_ss']; ?> €</td>
                                          </tr>
                                          <tr>
                                              <th>IRS</th>
                                              <td><?php echo "$row[valor_bruto]"; ?></td>
                                              <td></td>
                                              <td></td>
                                              <td class="color-primary"><?php echo round(($func['func_salario']/$row['desconto_irc'])); ?></td>
                                              <td><?php echo $row['desconto_irc']; ?> €</td>
                                          </tr>
                                          <tr>
                                              <th>Totais</th>
                                              <td></td>
                                              <td></td>
                                              <td><?php echo $row['valor_bruto']; ?></td>
                                              <td class="color-primary"</td>
                                              <td><?php echo round(($row['desconto_irc']+$row['desconto_ss']),2); ?></td>
                                          </tr>

                                      </tbody>
                                  </table>
                              </div>
                              <div class="table-responsive" style="float:right;">
                                                  <table class="table">
                                                      <thead>
                                                          <tr>

                                                              <th style="font-size:30px;color:black;">Total a Receber</th>

                                                          </tr>
                                                      </thead>
                                                      <tbody style="float:right;">
                                                          <tr>
                                                              <th scope="row" style="font-size:24px;color:black;"><?php echo "$row[valor_liquido]"; ?> €</th>
                                                          </tr>

                                                      </tbody>
                                                  </table>
                                              </div>

              </div>
      </div>

  </div>
  <script>
    $('#ano').val(<?php echo $_POST['ano'] ?>);
    $('#mes').val(<?php echo $_POST['mes'] ?>);
  </script>

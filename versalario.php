<?php

  $id_f = $_REQUEST['id_funcionario'];
  if(!$id_f){

      if(!@$_SESSION['userid']){

        echo'<meta http-equiv="refresh" content="0;url=/indexadmin.php?an=2"';

    }else{
      echo'<meta http-equiv="refresh" content="0;url=/indexuser.php"';
    }

  }
    include 'connections/conn.php';
    $dados = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM funcionarios WHERE id_funcionario='$id_f'"));

    include 'connections/diconn.php';


?>

<div class="page-wrapper">

  <div class="container-fluid">
                  <!-- Start Page Content -->
                  <div class="row">
                      <div class="col">
                          <div class="card card-outline-info">
                            <form method="post">
                              <div class="card-header">
                                  <h4 class="m-b-0 text-white" name="funcionario_p">Funcionario: <?php echo "$dados[func_nome]"; ?></h4>
                                  <input type="hidden" name="func_nome" value="<?php echo "$dados[func_nome]"; ?>">
                                  <input type="hidden" id="id" name="id" value=" <?php echo "$dados[id_funcionario]"; ?> ">
                              </div>
                              <div class="card-body">

                                      <div class="form-body">
                                          <h3 class="card-title m-t-15">Informações Fiscais</h3>
                                          <hr>
                                          <div class="row">
                                              <div class="col-md-12 ">
                                                  <div class="form-group">
                                                    </div>
                                              </div>
                                          </div>
                                          <!--/row-->
                                          <div class="row">
                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label>BI</label>
                                                      <input type="text" value="<?php echo "$dados[func_bi]"; ?>" name="bi_p" placeholder="Introduza o seu bi" max="8" class="form-control" readonly>
                                                  </div>
                                              </div>
                                              <!--/span-->
                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label>NIF</label>
                                                      <input type="text" value="<?php echo "$dados[func_nif]"; ?>" name="nif_p" placeholder="Introduza o seu nif" max="9" class="form-control" readonly>
                                                  </div>
                                              </div>
                                              <!--/span-->
                                          </div>
                                          <div class="row">
                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label>NISS</label>
                                                      <input type="text" value="<?php echo "$dados[func_niss]"; ?>" name="niss_p" placeholder="Introduza o seu niss" max="12" class="form-control" readonly>
                                                  </div>
                                              </div>
                                              <!--/span-->
                                              <div class="col-md-6">
                                                  <div class="form-group">
                                                      <label>NIB</label>
                                                      <input type="text" value="<?php echo "$dados[func_nib]"; ?>" name="nib_p" placeholder="Introduza o seu nib" max="21" class="form-control" readonly>
                                                  </div>
                                              </div>
                                              <!--/span-->
                                          </div>

                                          <h3 class="box-title m-t-40">Contablidade</h3>
                                          <hr>
                                          <div class="row">
                                              <div class="col-md-6 ">
                                                  <div class="form-group">
                                                      <label>Salario Base</label>
                                                      <input type="text" value="<?php echo "$dados[func_salario]"; ?>  €" name="func_salario"  class="form-control" readonly>
                                                  </div>

                                                  </select>


                                                    <?php


                                                    echo'<label>Turno</label><select required class="form-control custom-select" name="turno_mensal"  id="turno_mensal" tabindex="1" >
                                                        <option value="">Escolher</option>
                                                        <option value="1">Manhã</option>
                                                        <option value="2">Tarde</option>
                                                        <option value="3">Noite</option>
                                                        <option value="4">Sem Turno</option>
                                                    </select> ';
                                                    ?>


                                                    </div>



                                          </div>
                                          <div id="contablidade">
                                          </div>
                                          <br>
                                          <div class="input-group mb-3">

                                          <div class="input-group-prepend">
                                            <span class="input-group-text btn-info" style="color:white;" id="basic-addon1">Ano</span>
                                          </div>
                                          <select class="form-control custom-select" name="ano_p" tabindex="1">
                                              <?php for($i=2015;$i<=2020;$i++){echo "<option value=\"$i\">$i</option>";} ?>
                                          </select></div>

                                          </div>

                                          <div class="col-lg-4">

                                          </div>
                                            <div class="input-group mb-3">
                                              <div class="input-group-prepend">
                                        <span class="input-group-text btn-info" style="color:white;" id="basic-addon1">Mês</span>
                                              </div>
                                        <select class="form-control custom-select" name="mes_p" id="mes"  tabindex="1">
                                          <?php for($i=1;$i<=12;$i++){echo "<option value=\"$i\">$i";} ?>
                                          <option value="13">Subsidio Natal
                                          <option value="14">Subsidio Férias
                                        </option>"
                                        </select>

                                          </div>

                                          <?php
                                            if(@$_REQUEST['page']=='error')
                                            echo "<br><div class=\"alert alert-danger\">Já foi Processado</div>";
                                            ?>
                                          <br>
                                      <div class="form-actions">
                                          <button type="submit" name="bt_save" class="btn btn-info"> <i class="fa fa-check"></i> Emitir Recibo </button>
                                          <button type="button" class="btn btn-inverse">Cancelar</button>
                                      </div>



                              </div>
                              </form>
                              <?php





                                    if(isset($_POST['bt_save'])){
                                      include 'connections/conn.php';



                                      $row = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM recibos WHERE ano='$_POST[ano_p]' AND mes='$_POST[mes_p]' AND id_funcionario='$_POST[id]'"));


                                      if(!$row){
                                        mysqli_query($conn,"INSERT INTO recibos (ano,mes,nome_funcionario,nib_funcionario
                                        ,nif_funcionario,niss_funcionario,salario_base,turno_mensal,desconto_ss,desconto_irc,valor_liquido,valor_bruto,id_funcionario,subsidio_turno) VALUES (
                                          '$_POST[ano_p]','$_POST[mes_p]','$_POST[func_nome]','$_POST[nib_p]'
                                          ,'$_POST[nif_p]','$_POST[niss_p]','$_POST[func_salario]'
                                          ,'$_POST[turno_mensal]','$_POST[dss]','$_POST[dirs]','$_POST[valor_liquido]','$_POST[valor_bruto]','$_POST[id]','$_POST[subsidio_turno]'
                                        )");
                                        echo'<meta http-equiv="refresh" content="0;url=/indexadmin.php?an=2"';
                                      }else{
                                        echo'<meta http-equiv="refresh" content="0;url=/indexadmin.php?an=12&page=error&id_funcionario='.$_POST['id'].'">';

                                      }



                                      include 'connections/diconn.php';
                                    }
                              ?>
                          </div>

                      </div>
                  </div>

</div>

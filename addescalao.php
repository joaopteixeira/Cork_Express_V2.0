2<?php
/*
  @$an = $_REQUEST['an'];

  if(!$an){
    echo'<meta http-equiv="refresh" content="0;url=/indexadmin.php?an=1"';
  }
*/
?>

<div class="page-wrapper">
  <div class="container-fluid">
      <!-- Start Page Content -->
      <div class="row">

  <div class="col">
      <div class="card card-outline-primary">
          <div class="card-header">
              <h4 class="m-b-0 text-white">Adicionar Escalão De IRS</h4>
          </div>
          <div class="card-body">
              <form method="post">
                  <div class="form-body">
                      <div class="row p-t-20">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label class="control-label">Valor Do Escalão</label>
                                    <input type="text" class="form-control" name="descricao_irs"  placeholder="Categoria Profissional">
                                    <label class="control-label"> Parte Descontada Pelo Funcionario </label>
                                      <input type="text" class="form-control" name="funcionario_desconto_irs"  placeholder=" % ">
                                      <label class="control-label"> Parte Descontada Pela Empresa </label>
                                        <input type="text" class="form-control" name="empresa_desconto_irs"  placeholder=" % ">




                          </div>
                          <!--/span-->

                          <!--/span-->
                      </div>
                      <!--/row-->

                          <!--/span-->

                          <!--/span-->
                      </div>

                      </div>
                  </div>
                  <div class="form-actions">
                      <button type="submit" name="btguardar" class="btn btn-success"> <i class="fa fa-check"></i> Guardar </button>
                      <button type="button" class="btn btn-inverse">Cancelar</button>
                  </div>

              </form>



              <hr>
                      <div class="card-header">
                          <h4 class="m-b-0 text-white">Adicionar Escalão De SS</h4>
                      </div>
                      <div class="card-body">
                          <form method="post">
                              <div class="form-body">
                                  <div class="row p-t-20">
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label class="control-label">Valor Do Escalão</label>
                                                <input type="text" class="form-control" name="descricao_ss"  placeholder="Categoria Profissional">
                                                <label class="control-label"> Parte Descontada Pelo Funcionario </label>
                                                  <input type="text" class="form-control" name="funcionario_desconto_ss"  placeholder=" % ">
                                                  <label class="control-label"> Parte Descontada Pela Empresa </label>
                                                    <input type="text" class="form-control" name="empresa_desconto_ss"  placeholder=" % ">




                                      </div>
                                      <!--/span-->

                                      <!--/span-->
                                  </div>
                                  <!--/row-->

                                      <!--/span-->

                                      <!--/span-->
                                  </div>

                                  </div>
                              </div>
                              <div class="form-actions">
                                  <button type="submit" name="btguardarss" class="btn btn-success"> <i class="fa fa-check"></i> Guardar </button>
                                  <button type="button" class="btn btn-inverse">Cancelar</button>
                              </div>

                          </form>




              <?php

              if(isset($_POST["btguardar"]))
              {

                include 'connections/conn.php';

                mysqli_query($conn, "INSERT INTO irs (escalao,funcionario_desconto,empresa_desconto) VALUES ('$_POST[descricao_irs]','$_POST[funcionario_desconto_irs]','$_POST[empresa_desconto_irs]')"  );

                include 'connections/diconn.php';
              }


              if(isset($_POST["btguardarss"]))
              {

                include 'connections/conn.php';

                mysqli_query($conn, "INSERT INTO ss (escalao,funcionario_desconto,empresa_desconto) VALUES ('$_POST[descricao_ss]','$_POST[funcionario_desconto_ss]','$_POST[empresa_desconto_ss]')"  );

                include 'connections/diconn.php';
              }



               ?>





      </div>
  </div>

</div>
</div>

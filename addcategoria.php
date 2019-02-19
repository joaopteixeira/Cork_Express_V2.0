<?php
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
              <h4 class="m-b-0 text-white">Adicionar Categoria Profissional</h4>
          </div>
          <div class="card-body">
              <form method="post">
                  <div class="form-body">
                      <div class="row p-t-20">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label class="control-label">Descrição da Categoria Profissional</label>
                                    <input type="text" class="form-control" name="descricao"  placeholder="Categoria Profissional">




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

              <?php

              if(isset($_POST["btguardar"]))
              {

                include 'connections/conn.php';

                mysqli_query($conn, "INSERT INTO categoria_profissional (descricao_categoria) VALUES ('$_POST[descricao]')"  );



                include 'connections/diconn.php';
              }

               ?>

          </div>
      </div>
  </div>

</div>
</div>

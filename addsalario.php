
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
    <div class="card card-outline-info">

    <div class="card-header">
      <h4 class="card-title text-white">Emitir Recibo</h4>
    </div>
                                        <div class="card-body">
                                            <div class="card-title text-white">

                                            </div>
                                            <hr>

                              <div class="table-responsive m-t-40">
                                  <table id="myTable" class="table table-bordered table-striped">
                                      <thead>
                                          <tr role="row">
                                                <th style="text-align:left;">Nome</th>
                                                  <th style="text-align:left;">NIF</th>
                                                    <th style="text-align:left;">Salario</th>
                                                    <th style="text-align:left;">Action</th>

                                          </tr>
                                      </thead>
                                      <tbody>




                                                          <?php
                                                            include 'connections/conn.php';

                                                            $dadossalary = mysqli_query($conn, "SELECT id_funcionario,func_nome,func_nif,id_categoria,func_tipodepart,func_salario from funcionarios");


                                                              while($rowsalary = mysqli_fetch_array($dadossalary)){
                                                                echo '<tr><td style="text-align:left;">'.$rowsalary['func_nome'].'</td>
                                                                <td>'.$rowsalary['func_nif'].'</td>';

                                                                echo '<td style="text-align:left;">'.$rowsalary['func_salario'].'</td>';
                                                                echo '<td><form method="post" action="/indexadmin.php?an=12">
                                                                  <input type="hidden" name="id_funcionario" value="'.$rowsalary['id_funcionario'].'">
                                                                  <input type="submit" name="btemitir" class="btn btn-success m-b-10 m-l-5" value="Emitir Recibo">
                                                                  </form>
                                                                </td>
                                                                </tr>';


                                                            }

                                                            include 'connections/diconn.php';
                                                           ?>


                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        </div>

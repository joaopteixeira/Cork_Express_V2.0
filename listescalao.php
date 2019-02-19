<?php/*
  @$an = $_REQUEST['an'];

  if(!$an){
    echo'<meta http-equiv="refresh" content="0;url=/indexadmin.php?an=1"';
  }
*/
?>

<div class="page-wrapper">
  <div class="container-fluid">

<div class="card">
    <div class="card-body">
        <h4 class="card-title">Listar Escalões de IRS </h4>
        <div class="table-responsive m-t-40">
            <table id="myTable" class="table table-bordered table-striped">
                <thead>
                    <tr role="row">
                          <th style="text-align:left;">Escalão</th>
                            <th style="text-align:left;">Percentagem De Desconto do funcionario</th>
                              <th style="text-align:left;">Percentagem De Desconto da Empresa</th>

                    </tr>
                </thead>
                <tbody>



                   <?php

                     include 'connections/conn.php';

                     $dados = mysqli_query($conn, "SELECT * from irs");

                       while($row = mysqli_fetch_array($dados)){
                         echo '<form method="post"><tr>';

                         if(@!$_SESSION["escalao"]){
                           echo '<td style="text-align:left;font-size:14px;">'.$row['escalao'];
                            echo '<td>'.$row['funcionario_desconto'].'</td>
                                  <td>'.$row['empresa_desconto'].'</td>';

                           $x=0;
                         }else{
                           if($_SESSION["escalao"] == $row['id_irs']){
                             echo '<td style="text-align:left;font-size:14px;">
                             <input class="form-control" type="text" name="escalao" value="'.$row['escalao'].'">
                            <td>  <input class="form-control" type="text" name="funcionario_desconto" value="'.$row['funcionario_desconto'].'"></td>
                               <td><input class="form-control" type="text" name="empresa_desconto" value="'.$row['empresa_desconto'].'"></td>';
                             $x=1;
                           }else{
                             echo '<td style="text-align:left;font-size:24px;">'.$row['escalao'];
                             $x=0;
                           }

                         }
                         echo '</td><td><div class="form-actions"><input type="hidden" name="id_irs" value="'.$row['id_irs'].'">';
                         if($x==1){
                           echo '<button type="submit" name="btenviari" class="btn btn-success m-b-10 m-l-5">Submeter</button>';
                         }else{
                           echo '<button type="submit" name="bteditari" class="btn btn-info m-b-10 m-l-5">Editar</button>';
                         }

                             echo '<button type="submit" name="btapagari" class="btn btn-danger m-b-10 m-l-5">Apagar</button>
                                   </div></td></tr></form>';

                     }

                     include 'connections/diconn.php';

                    ?>







                </tbody>
            </table>

        </div>
    </div>
    <hr>
    <div class="card-body">
        <h4 class="card-title">Listar Escalões de SS</h4>
        <div class="table-responsive m-t-40">
            <table id="myTable" class="table table-bordered table-striped">
                <thead>
                    <tr role="row">
                      <th style="text-align:left;">Escalão</th>
                        <th style="text-align:left;">Percentagem De Desconto do funcionario</th>
                          <th style="text-align:left;">Percentagem De Desconto da Empresa</th>
                    </tr>
                </thead>
                <tbody>




                                      <?php

                                        include 'connections/conn.php';

                                        $dados = mysqli_query($conn, "SELECT * from ss");

                                          while($row = mysqli_fetch_array($dados)){
                                            echo '<form method="post"><tr>';

                                            if(@!$_SESSION["escalao"]){
                                              echo '<td style="text-align:left;font-size:14px;">'.$row['escalao'];
                                               echo '<td>'.$row['funcionario_desconto'].'</td>
                                                     <td>'.$row['empresa_desconto'].'</td>';

                                              $x=0;
                                            }else{
                                              if($_SESSION["escalao"] == $row['id_ss']){
                                                echo '<td style="text-align:left;font-size:14px;">
                                                <input class="form-control" type="text" name="escalao" value="'.$row['escalao'].'">
                                               <td>  <input class="form-control" type="text" name="funcionario_desconto" value="'.$row['funcionario_desconto'].'"></td>
                                                  <td><input class="form-control" type="text" name="empresa_desconto" value="'.$row['empresa_desconto'].'"></td>';
                                                $x=1;
                                              }else{
                                                echo '<td style="text-align:left;font-size:24px;">'.$row['escalao'];
                                                $x=0;
                                              }

                                            }
                                            echo '</td><td><div class="form-actions"><input type="hidden" name="id_ss" value="'.$row['id_ss'].'">';
                                            if($x==1){
                                              echo '<button type="submit" name="btenviarss" class="btn btn-success m-b-10 m-l-5">Submeter</button>';
                                            }else{
                                              echo '<button type="submit" name="bteditarss" class="btn btn-info m-b-10 m-l-5">Editar</button>';
                                            }

                                                echo '<button type="submit" name="btapagarss" class="btn btn-danger m-b-10 m-l-5">Apagar</button>
                                                      </div></td></tr></form>';

                                        }

                                        include 'connections/diconn.php';

                                       ?>


                </tbody>
            </table>
            <?php


            if(isset($_POST["bteditari"]))
            {



              $_SESSION['escalao'] = $_POST['id_irs'];
              echo'<meta http-equiv="refresh" content="0;url=/indexadmin.php?an=8"';


            }
            if(isset($_POST["btenviari"]))
            {

              //Codigo para emviar para a base de dados
              include 'connections/conn.php';

              mysqli_query($conn,"UPDATE irs SET escalao = '$_POST[escalao]',funcionario_desconto = '$_POST[funcionario_desconto]',empresa_desconto = '$_POST[empresa_desconto]'WHERE id_irs = $_POST[id_irs]");

              include 'connections/diconn.php';

              unset($_SESSION['escalao']);
        //              session_destroy();

              echo '<meta http-equiv="refresh" content="0;url=/indexadmin.php?an=8"';

            }


            if(isset($_POST['btapagari']))
            {

              include 'connections/conn.php';

              mysqli_query($conn, "DELETE FROM irs WHERE id_irs = '$_POST[id_irs]'");

              echo'<meta http-equiv="refresh" content="0;url=/indexadmin.php?an=8"';

              include 'connections/diconn.php';

            }



                        if(isset($_POST["bteditarss"]))
                        {



                          $_SESSION['escalao'] = $_POST['id_ss'];
                          echo'<meta http-equiv="refresh" content="0;url=/indexadmin.php?an=8"';


                        }
                        if(isset($_POST["btenviarss"]))
                        {

                          //Codigo para emviar para a base de dados
                          include 'connections/conn.php';

                          mysqli_query($conn,"UPDATE ss SET escalao = '$_POST[escalao]',funcionario_desconto = '$_POST[funcionario_desconto]',empresa_desconto = '$_POST[empresa_desconto]'WHERE id_ss = $_POST[id_ss]");

                          include 'connections/diconn.php';

                          unset($_SESSION['escalaoss']);
                    //              session_destroy();

                          echo '<meta http-equiv="refresh" content="0;url=/indexadmin.php?an=8"';

                        }


                        if(isset($_POST['btapagarss']))
                        {

                          include 'connections/conn.php';

                          mysqli_query($conn, "DELETE FROM ss WHERE id_ss= '$_POST[id_ss]'");

                          echo'<meta http-equiv="refresh" content="0;url=/indexadmin.php?an=8"';

                          include 'connections/diconn.php';

                        }


             ?>
        </div>
    </div>

</div>
</div>
</div>

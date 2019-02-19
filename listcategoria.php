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
        <h4 class="card-title">Listar Todas As Categorias </h4>
        <div class="table-responsive m-t-40">
            <table id="myTable" class="table table-bordered table-striped">
                <thead>
                    <tr role="row">
                        <th style="text-align:left;">Descrição Da Categoria</th>
                        <th style="text-align:left;">Ações</th>
                    </tr>
                </thead>
                <tbody>
                  <?php

                    include 'connections/conn.php';

                    $dados = mysqli_query($conn, "SELECT * from categoria_profissional");

                      while($row = mysqli_fetch_array($dados)){
                        echo '<form method="post"><tr>';

                        if(@!$_SESSION["categoria"]){
                          echo '<td style="text-align:left;font-size:14px;">'.$row['descricao_categoria'];
                          $x=0;
                        }else{
                          if($_SESSION["categoria"] == $row['id_categoria']){
                            echo '<td style="text-align:left;font-size:14px;">
                            <input class="form-control" type="text" name="descricao_categoria" value="'.$row['descricao_categoria'].'">';
                            $x=1;
                          }else{
                            echo '<td style="text-align:left;font-size:24px;">'.$row['descricao_categoria'];
                            $x=0;
                          }

                        }
                        echo '</td><td><div class="form-actions"><input type="hidden" name="id_categoria" value="'.$row['id_categoria'].'">';
                        if($x==1){
                          echo '<button type="submit" name="btenviar" class="btn btn-success m-b-10 m-l-5">Submeter</button>';
                        }else{
                          echo '<button type="submit" name="bteditar" class="btn btn-info m-b-10 m-l-5">Editar</button>';
                        }

                            echo '<button type="submit" name="btapagar" class="btn btn-danger m-b-10 m-l-5">Apagar</button>
                                  </div></td></tr></form>';

                    }

                    include 'connections/diconn.php';

                   ?>




                </tbody>
            </table>
            <?php


            if(isset($_POST["bteditar"]))
            {



              $_SESSION['categoria'] = $_POST['id_categoria'];
              echo'<meta http-equiv="refresh" content="0;url=/indexadmin.php?an=6"';


            }
            if(isset($_POST["btenviar"]))
            {

              //Codigo para emviar para a base de dados
              include 'connections/conn.php';

              mysqli_query($conn,"UPDATE categoria_profissional SET descricao_categoria = '$_POST[descricao_categoria]' WHERE id_categoria = $_POST[id_categoria]");

              include 'connections/diconn.php';

              unset($_SESSION['categoria']);
//              session_destroy();

              echo '<meta http-equiv="refresh" content="0;url=/indexadmin.php?an=6"';

            }


            if(isset($_POST['btapagar']))
            {

              include 'connections/conn.php';

              mysqli_query($conn, "DELETE FROM categoria_profissional WHERE id_categoria = '$_POST[id_categoria]'");

              echo'<meta http-equiv="refresh" content="0;url=/indexadmin.php?an=6"';

              include 'connections/diconn.php';

            }



             ?>
        </div>
    </div>
</div>
</div>
</div>

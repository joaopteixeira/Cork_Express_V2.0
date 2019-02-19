<?php
/*
  @$an = $_REQUEST['an'];

  if(!$an){
    echo'<meta http-equiv="refresh" content="0;url=/indexuser.php?an=1"';
  }
*/
?>

<!-- Page wrapper  -->
<div class="page-wrapper">
    <!-- Bread crumb -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h3 class="text-primary">Dashboard</h3> </div>
        <div class="col-md-7 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
    </div>
    <!-- End Bread crumb -->
    <!-- Container fluid  -->
    <div class="container-fluid">
        <!-- Start Page Content -->
        <div class="row">
            <div class="col-md-3">
                <div class="card p-30">
                    <div class="media">
                        <div class="media-left meida media-middle">
                            <span><i class="fa fa-usd f-s-40 color-primary"></i></span>
                        </div>
                        <div class="media-body media-text-right">
                          <h2><?php
                          include 'connections/conn.php';
                          $dados = mysqli_fetch_array(mysqli_query($conn, "SELECT SUM(func_salario) as total from funcionarios"));
                          echo round($dados['total'],2);
                          include 'connections/diconn.php';

                            ?> €</h2>
                            <p class="m-b-0">Total Gasto em Ordenados</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-30">
                    <div class="media">
                        <div class="media-left meida media-middle">
                            <span><i class="fa fa-shopping-cart f-s-40 color-success"></i></span>
                        </div>
                        <div class="media-body media-text-right">
                          <h2><?php
                          include 'connections/conn.php';
                          $dados = mysqli_fetch_array(mysqli_query($conn, "SELECT SUM(desconto_irc)  as totalirs from recibos"));


                          echo round($dados['totalirs'],2);
                          include 'connections/diconn.php';

                            ?> €</h2>
                            <p class="m-b-0">Total Gastos em IRS</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-30">
                    <div class="media">
                        <div class="media-left meida media-middle">
                            <span><i class="fa fa-archive f-s-40 color-warning"></i></span>
                        </div>
                        <div class="media-body media-text-right">
                          <h2><?php
                          include 'connections/conn.php';
                          $dados1 = mysqli_fetch_array(mysqli_query($conn, "SELECT SUM(desconto_ss)  as totalss from recibos"));
                          echo round($dados1['totalss'],2);
                          include 'connections/diconn.php';

                            ?> €</h2>
                            <p class="m-b-0">Total Gasto em Segurança Social</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-30">
                    <div class="media">
                        <div class="media-left meida media-middle">
                            <span><i class="fa fa-user f-s-40 color-danger"></i></span>
                        </div>
                        <div class="media-body media-text-right">
                            <h2><?php
                            include 'connections/conn.php';
                            $dados = mysqli_fetch_array(mysqli_query($conn, "SELECT COUNT(id_funcionario) as total from funcionarios"));
                            echo round($dados['total'],2);
                            include 'connections/diconn.php';

                              ?></h2>
                            <p class="m-b-0">Funcionarios</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
          <div class="col-lg-6">
              <div class="card">
                  <div class="card-title">
                      <h4>Pagamentos processados no ultimo mês </h4>
                  </div>
                  <div class="card-body">
                      <div class="table-responsive">
                          <table class="table">
                              <thead>
                                  <tr>
                                      <th>Nome</th>
                                      <th>NIF</th>
                                      <th>Total a Receber</th>
                                      <th>Estado</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php

                                include 'connections/conn.php';

                                include 'connections/conn.php';
                                $year = date('Y');
                                $mes = date('m');
                                $dados = mysqli_query($conn,"SELECT recibos.nome_funcionario as nome,recibos.nif_funcionario as nif,recibos.valor_liquido as receber FROM recibos left join funcionarios on recibos.id_funcionario = funcionarios.id_funcionario where recibos.mes = '$mes' and recibos.ano = '$year'");


                                  while($row = mysqli_fetch_array($dados)){
                                      echo "<tr>
                                          <td>$row[nome]</td>
                                          <td><span>$row[nif]</span></td>
                                          <td><span>$row[receber] €</span></td>
                                          <td><span class=\"badge badge-success\">Efectudado</span></td>
                                      </tr>";

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

    <!-- End Container fluid  -->
    <!-- footer -->
    <footer class="footer"> © 2018 All rights reserved by João Vilares & João Mirante</a></footer>
    <!-- End footer -->
</div>
<!-- End Page wrapper  -->

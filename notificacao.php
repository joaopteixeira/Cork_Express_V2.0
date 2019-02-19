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
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-content">
                            <!-- Left sidebar -->
                            <div class="inbox-leftbar">
                              <?php @$page = $_REQUEST['page'];

                              if(!empty(@$_SESSION['userid'])){
                                if($page=='inbox')
                                {
                                  echo "<a class=\"btn btn-danger btn-block waves-effect waves-light\" href=\"/indexuser.php?an=4&page=compose\">Enviar Notificação";
                                }else
                                {
                                  echo "<a class=\"btn btn-danger btn-block waves-effect waves-light\" href=\"/indexuser.php?an=4&page=inbox\">Ver Notificações";
                                }
                              }else if(!empty(@$_SESSION['admin'])){
                                 if($page=='inbox')
                                 {
                                   echo "<a class=\"btn btn-danger btn-block waves-effect waves-light\" href=\"/indexadmin.php?an=9&page=compose\">Enviar Notificação";
                                 }else
                                 {
                                   echo "<a class=\"btn btn-danger btn-block waves-effect waves-light\" href=\"/indexadmin.php?an=9&page=inbox\">Ver Notificações";
                                 }
                               }
                                 ?></a>

                                <div class="mail-list mt-4">
                                    <?php include 'connections/conn.php';
                                            if(empty(@$_SESSION['userid'])){
                                              $q = mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(id_notificacao) as total FROM notificacao WHERE estado = '0' AND id_funcionario='0'"));
                                              echo "<a class=\"list-group-item border-0 text-danger\" href=\"/indexadmin.php?an=9&page=inbox\"><i class=\"mdi mdi-inbox font-18 align-middle mr-2\"></i><b>Inbox</b>";
                                            }else{
                                              $q = mysqli_fetch_array(mysqli_query($conn,"SELECT COUNT(id_notificacao) as total FROM notificacao WHERE estado = '0' AND id_funcionario='$_SESSION[userid]'"));
                                              echo "<a class=\"list-group-item border-0 text-danger\" href=\"/indexuser.php?an=4&page=inbox\"><i class=\"mdi mdi-inbox font-18 align-middle mr-2\"></i><b>Inbox</b>";

                                            }
                                                      if($q['total'] != '0'){
                                                      echo "<span class=\"label label-danger float-right ml-2\">$q[total]</span>";
                                                    }

                                                     include 'connections/diconn.php';?></a>
                                      </div>


                            </div>
                            <!-- End Left sidebar -->

                            <div class="inbox-rightbar">



                                  <?php
                                  @$page = $_REQUEST['page'];

                                  switch ($page) {
                                    case 'compose':
                                      // code...
                                      include 'sendnotify.php';
                                      break;
                                    case 'inbox':
                                          include 'inboxnotify.php';
                                        break;
                                    case 'read':
                                        include 'viewnotify.php';
                                        break;
                                        default:
                                        include 'inboxnotify.php';
                                      break;
                                      }

                                    ?>


                            </div>

                            <div class="clearfix"></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End PAge Content -->
    </div>
    <!-- End Container fluid  -->
    <!-- footer -->
    <footer class="footer"> © 2018 All rights reserved by João Vilares & João Mirante  </footer>
    <!-- End footer -->
</div>

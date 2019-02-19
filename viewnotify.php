<?php
  if(!@$_POST['id_notificacao']){
    if(!@$_SESSION['userid']){
      echo'<meta http-equiv="refresh" content="0;url=/indexadmin.php?an=9&page=inbox"';
    }else{
      echo'<meta http-equiv="refresh" content="0;url=/indexuser.php?an=4&page=inbox"';
    }
  }else{
    include 'connections/conn.php';
    $row = mysqli_fetch_array(mysqli_query($conn,"SELECT * FROM notificacao WHERE id_notificacao='$_POST[id_notificacao]'"));
    mysqli_query($conn,"UPDATE notificacao SET estado = '1' WHERE id_notificacao='$_POST[id_notificacao]'");
    include 'connections/diconn.php';
  }

?>
<div class="mt-4">



    <div class="media mb-4 mt-1">
        <div class="media-body">
            <span class="pull-right"><?php echo "$row[data]"; ?></span>
            <h6 class="m-0"><b>From</b>: <?php echo "$row[nome]"; ?></h6>

        </div>
    </div>

    <h5><b>Assunto</b>:<?php echo "$row[assunto]"; ?></h5>

    <hr/>
    <p><b>Menssagem</b>:<?php echo "$row[msg]"; ?></p>


    <hr/>

</div>

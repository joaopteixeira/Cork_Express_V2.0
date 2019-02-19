<div class="mt-4">

    <form role="form" method="post">

      <?php
      if(!@$_SESSION['userid']){
        echo '<div class="form-group">
        <select class="form-control custom-select" name="id_funcionario">';
        include 'connections/conn.php';

        $dados = mysqli_query($conn, "SELECT id_funcionario,func_nome from funcionarios");

          while($row = mysqli_fetch_array($dados)){
            echo "
              <option value=\"$row[id_funcionario]\">$row[func_nome]</option>
            ";

        }
        
        echo '</select>
        </div>';
        include 'connections/diconn.php';
      }
       ?>

        <div class="form-group">
            <input type="text" class="form-control" placeholder="Subject" name="assunto">
        </div>
        <div class="form-group">
            <textarea  rows="8" cols="80" class="form-control" name="msg" style="height:300px">


                                                       </textarea>
        </div>

        <div class="form-group m-b-0">
            <div class="text-right">
                <button type="button" class="btn btn-success waves-effect waves-light m-r-5"><i class="fa fa-floppy-o"></i></button>
                <button type="button" class="btn btn-success waves-effect waves-light m-r-5"><i class="fa fa-trash-o"></i></button>
                <button type="submit" name="bt_enviar" class="btn btn-purple waves-effect waves-light"> <span>Send</span> <i class="fa fa-send m-l-10"></i> </button>
            </div>
        </div>

    </form>

    <?php

    if(!@$_SESSION['userid']){
      if(isset($_POST['bt_enviar'])){
        include 'connections/conn.php';
        $data = date('Y-m-d');
        echo "$data";

        mysqli_query($conn, "INSERT INTO notificacao (nome, assunto,msg, data, estado,id_funcionario)
        VALUES ('Administrador', '$_POST[assunto]', '$_POST[msg]', '$data', '0','$_POST[id_funcionario]')");

        include 'connections/diconn.php';

      }
    }else{
      if(isset($_POST['bt_enviar'])){
        include 'connections/conn.php';
        $data = date('Y-m-d');
        echo "$data";

        mysqli_query($conn, "INSERT INTO notificacao (nome, assunto,msg, data, estado,id_funcionario)
        VALUES ('$_SESSION[username]', '$_POST[assunto]', '$_POST[msg]', '$data', '0','0')");

        include 'connections/diconn.php';

      }
    }



     ?>
</div>

S<?php

function login($username,$password){


  if(empty($username) || empty($password)){

  }else{


    include 'connections/conn.php';
  $login = mysqli_fetch_array(mysqli_query($conn,"SELECT username,password,id_funcionario,tipo from login WHERE username='$username' and password='$password'"));

  if(!$login){
    //Password ou Username incorretos!
    echo "$username  | $password";
  }else{


    if($login['tipo']=="1"){
      session_start();
      $_SESSION['admin'] = $login['username'];
      echo'<meta http-equiv="refresh" content="0;url=/indexadmin.php">';
    }else{
      $user = mysqli_fetch_array(mysqli_query($conn,"SELECT id_funcionario,func_nome from funcionarios WHERE id_funcionario = '$login[id_funcionario]'"));
      session_start();
      $_SESSION['userid'] = $user['id_funcionario'];
      $_SESSION['username'] = $user['func_nome'];
      echo'<meta http-equiv="refresh" content="0;url=/indexuser.php">';

    }


}

  }





  include 'connections/diconn.php';
}



 ?>

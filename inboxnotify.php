

<div class="">
    <div class="mt-4">
        <div class="">
            <ul class="message-list">

              <?php
                include 'connections/conn.php';

                if(!@$_SESSION['userid']){
                  $q = mysqli_query($conn,"SELECT * FROM notificacao WHERE id_funcionario='0' ORDER BY data desc");

                }else{
                  $q = mysqli_query($conn,"SELECT * FROM notificacao WHERE id_funcionario='$_SESSION[userid]' ORDER BY data desc");

                }


                while($noti = mysqli_fetch_array($q)){
                  if(!@$_SESSION['userid']){

                    echo '<form id="form'.$noti['id_notificacao'].'" action="/indexadmin.php?an=9&page=read" method="post">';
                  }else{

                    echo '<form id="form'.$noti['id_notificacao'].'" action="/indexuser.php?an=4&page=read" method="post">';
                  }

                    echo "<li class=\"unread\">
                    <input type=\"hidden\" name=\"id_notificacao\" value=\"$noti[id_notificacao]\">
                        <a href=\"javascript:;\" onclick=\"document.getElementById('form$noti[id_notificacao]').submit();\">
                            <div class=\"col-mail col-mail-1\">
                                <div class=\"checkbox-wrapper-mail\">
                                    <input type=\"checkbox\" id=\"chk1\">
                                    <label class=\"toggle\" for=\"chk1\"></label>
                                </div>
                                <p class=\"title\">$noti[nome]</p><span class=\"star-toggle fa fa-star-o\"></span>
                            </div>
                            <div class=\"col-mail col-mail-2\">
                                <div class=\"subject\">$noti[assunto] &nbsp;&ndash;&nbsp;
                                    <span class=\"teaser\">$noti[msg]</span>
                                </div>
                                <div class=\"date\">$noti[data]</div>
                            </div>
                        </a>
                    </li>";
                    echo '</form>';
                }


                include 'connections/diconn.php';

                ?>



            </ul>
        </div>

    </div>
    <!-- panel body -->
</div>
<!-- panel -->

<div class="row">
    <div class="col-7">
        Showing 1 - 20 of 289
    </div>
    <div class="col-5">
        <div class="btn-group float-right">
            <button class="btn btn-gradient waves-effect" type="button"><i class="fa fa-chevron-left"></i></button>
            <button class="btn btn-gradient waves-effect" type="button"><i class="fa fa-chevron-right"></i></button>
        </div>
    </div>
</div>

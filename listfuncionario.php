

<div class="page-wrapper">
  <div class="container-fluid">

<div class="card card-outline-info">
    <div class="">
      <div class="card-header">


        <h4 class="card-title text-white">Listagem de Funcionarios</h4>
        </div>
        <div class="table-responsive m-t-40">
            <table id="myTable" class="table table-bordered table-striped">
                <thead>
                    <tr role="row">
                          <th style="text-align:left;">Nome</th>
                            <th style="text-align:left;">NIF</th>
                              <th style="text-align:left;">Tipo de Categoria</th>
                              <th style="text-align:left;">Tipo de Departamento</th>
                              <th style="text-align:left;">Salario</th>
                              <th style="text-align:left;">Action</th>

                    </tr>
                </thead>
                <tbody>



                  <?php
                    include 'connections/conn.php';

                    $dados = mysqli_query($conn, "SELECT id_funcionario,func_nome,func_nif,id_categoria,func_tipodepart,func_salario from funcionarios");

                      $i = 0;
                      while($row = mysqli_fetch_array($dados)){
                        echo '<tr><td style="text-align:left;">'.$row['func_nome'].'</td>
                        <td>'.$row['func_nif'].'</td>';
                        $cate = mysqli_fetch_array(mysqli_query($conn, "SELECT descricao_categoria from categoria_profissional where id_categoria = '$row[id_categoria]'"));
                        echo '<td>'.$cate['descricao_categoria'].'</td>';
                        if($row['func_tipodepart'] == 1){
                          echo '<td>Escritorio</td>';
                        }else{
                            echo '<td>Operacional</td>';
                        }
                        echo '<td>'.$row['func_salario'].' €</td>
                        ';

                          $i+=1;



                   ?>
                   <td>
                     <form method="post" action="/indexadmin.php?an=13">
                        <input type="hidden" name="id_funcionario" value="<?php echo $row['id_funcionario']; ?>">
                        <input type="submit" name="bt_editar" class="btn btn-success" value="Editar">
                     </form>
                     <div class="sweetalert m-t-15">
                     <button type="button" id="2" value="<?php echo $row['id_funcionario'];?>" class="btn btn-warning btn sweet-success-cancel">Apagar</button>
                 </div>
                   </td>
                   </tr>
                 <?php } include 'connections/diconn.php';?>



                </tbody>
            </table>

            <?php
            if(isset($_POST['btapagar']))
            {

              include 'connections/conn.php';



              mysqli_query($conn, "DELETE FROM funcionarios WHERE id_funcionario = '$_POST[id_funcionario]'");

              echo'<meta http-equiv="refresh" content="0;url=/indexadmin.php?an=4">';

              include 'connections/diconn.php';
            } ?>



        </div>

    </div>

</div>
<?php
if(@$_REQUEST['page']=='sucesso'){
  echo "<div class=\"alert alert-info\">Atualizado com Sucesso!</div>";
}
?>
</div>

</div>

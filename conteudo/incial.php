<?php include_once 'php_action/db_usersblacklist_connect.php';

?>
<div class="row">

    <div class="col  s12 m6 push-m3">
        <div clas="row">
            <div class="col s12"><a href="controleusuario.php"><h3 class="light indigo-text text-darken-4 ">Funcionarios</h3></a>
                <br>
            </div>
            <form method="POST">
                <div class="input-field col s5 push-m6">
                    <input type= "text" name="pesquisar" id="pesquisar">
                    <label for="pesquisar">Pesquisar</label>
                </div>
                <div class="col s1 push-m6">
                    <button type="submit"class="btn-floating #1a237e indigo darken-4">
                        <i class="material-icons">search</i>
                    </button>
                </div>
            </form>

        </div>
         <table class="striped">
             <tr>
                 <td class="center">Nome</td>
                 <td class="center">Sobrenome</td>
                 <td class="center">Setor</td>
                 <td class="center">e-mail</td>
                 <td class="center">Nível de acesso</td>
                 <td class="center">Data de Cadastro</td>
                 <td class="center">Ações</td>
             </tr>
             <?php
             if(isset ($_POST['pesquisar'])){
                 $pesquisar = $_POST['pesquisar'];


                 $sqluser = "SELECT * FROM usuario WHERE nome LIKE '%$pesquisar%' 
                        OR sobrenome LIKE '%$pesquisar%'    
                        OR setor LIKE '%$pesquisar%'
                        OR email LIKE '%$pesquisar%'
                        OR nivel_acesso LIKE '%$pesquisar%'
                        OR datacadastro LIKE '%$pesquisar%'";
                 $resultado = mysqli_query($mysqli, $sqluser);
             }else{
                 $sqluser = "SELECT * FROM usuario";
                 $resultado = mysqli_query($mysqli, $sqluser);
             }
             while ($dados = mysqli_fetch_array($resultado)){
             $date = new datetime($dados['datacadastro']);
             if($dados['nivel_acesso']==1){$nivelAcesso = "comum";}else{$nivelAcesso="Administrador";}
             if($dados['setor']==1){
                 $setor = "Comercial";
             }elseif($dados['setor']==2){
                 $setor = "Cobrança";
             }else{
                 $setor = "Outros";
             }
             ?>

             <tr>
                 <td class="center"><?php echo $dados['nome']?></td>
                 <td class="center"><?php echo $dados['sobrenome']?></td>
                 <td class="center"><?php echo $setor;?></td>
                 <td class="center"><?php echo $dados['email']?></td>
                 <td class="center"><?php echo $nivelAcesso?></td>
                 <td class="center"><?php echo $date->format("d/m/Y")?></td>
                 <td class="center">
                     <a href="controleusuario.php?=editar" class="btn-floatin" ><i class="material-icons">create</i></a>
                     <a href="controleusuario.php?p=deletar" class="btn-floatin"><i class="material-icons" style="color:red">clear</i></a>
                 </td>
             </tr>
             <?php }?>
         </table>
        <br>
        <div>
                <a href="controleusuario.php?p=cadastrarusuario"
                   class="left-align btn #1a237e indigo darken-4 "
                   style="border-radius: 30px">
                    Cadastrar novo funcionário
                    <i class="material-icons right">add</i>
                </a>
                <a href=""
                   class="center-align btn #1a237e indigo darken-4 "
                   style="border-radius: 30px">
                    Blacklist
                    <i class="material-icons right">assignment</i>
                </a>
        </div>

    </div>
</div>
<?php

//conexão
include_once 'php_action/db_connect.php';
//header
include_once 'includes/header.php';
//mensagem
include_once 'includes/mensagem.php'
?>

<div class ="row center">
    <div class="col s16 m11 push-m1 center">

        <div clas="row">
            <div class="col s12"><a href="index.php"><h3
                            class="light indigo-text text-darken-4 left ">Blacklist CleanNet</h3></a>
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
        <table class="striped row s16 m9  push-m1 center">
            <thead>
                <th class="center">Rua</th>
                <th class="center"> N°</th>
                <th class="center">Complemento</th>
                <th class="center">Bairro</th>
                <th class="center">cidade</th>
                <th class="center">CEP</th>
                <th class="center">Nome</th>
                <th class="center">Sobrenome</th>
                <th class="center">CPF</th>
                <th class="center">Data inclusão</th>
                <th class="center">mais de 6 meses de blacklist?</th>
            </thead>

            <tbody>
            <?php
                if(isset ($_POST['pesquisar'])){
                    $pesquisar = $_POST['pesquisar'];
                    $sql = "SELECT * FROM endereco WHERE rua LIKE '%$pesquisar%' 
                            OR numero LIKE '%$pesquisar%'    
                            OR bairro LIKE '%$pesquisar%'
                            OR cidade LIKE '%$pesquisar%'
                            OR cep LIKE '%$pesquisar%'
                            OR nome LIKE '%$pesquisar%'
                            OR sobrenome LIKE '%$pesquisar%'
                            OR cpf LIKE '%$pesquisar%'
                            OR data_inclusao LIKE '%$pesquisar%'";
                    $resultado = mysqli_query($connect, $sql);
                }else{
                    $sql = "SELECT * FROM endereco";
                    $resultado = mysqli_query($connect, $sql);
                }
                while ($dados = mysqli_fetch_array($resultado)){
                    $date = new datetime($dados['data_inclusao']);

                    ?>
                    <tr>
                        <td class="center"><?php echo $dados['rua']?></td>
                        <td class="center"><?php echo $dados['numero']?></td>
                        <td class="center"><?php echo $dados['complemento']?></td>
                        <td class="center"><?php echo $dados['bairro']?></td>
                        <td class="center"><?php echo $dados['cidade']?></td>
                        <td class="center"><?php echo $dados['cep']?></td>
                        <td class="center"><?php echo $dados['nome']?></td>
                        <td class="center"><?php echo $dados['sobrenome']?></td>
                        <td class="center"><?php echo $dados['cpf']?></td>
                        <td class="center"><?php echo $date->format('d/m/Y')?></td>
                        <td class="center"><?php
                            $datahoje = date_create();
                            $resultData = date_diff( $date, $datahoje);

                            if($resultData->format('%M')>=6){
                                echo " <i class='material-icons'style='color:green'>check</i>";
                            }else{
                                echo " <i class='material-icons 'style=' color:red'>close</i>";
                            }
                            ?></td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
        <br>
        <a href="adicionar.php" class="btn #1a237e indigo darken-4 left" style="border-radius: 30px">
            Adicionar Endereço
            <i class="material-icons right">add</i>
        </a>
    </div>
</div>


<?php
//footer
include_once 'includes/footer.php';
?>
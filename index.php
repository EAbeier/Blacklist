<?php

//conexão
include_once 'php_action/db_connect.php';
//header
include_once 'includes/header.php';
//mensagem
include_once 'includes/mensagem.php'
?>

<div class ="row center">
    <div class="col s16 m9 push-m2 center">

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
                <th class="center">Nome</th>
                <th class="center">Contrato</th>
                <th class="center">Data inclusão</th>
                <th class="center">mais de 6 meses de blacklist?</th>
            </thead>

            <tbody>
            <?php
                $maxLinks = 5;
                $total_reg = "10";
                if(isset ($_POST['pesquisar'])){ 
                    $pesquisar = $_POST['pesquisar'];
                    $sql = "SELECT * FROM endereco WHERE rua LIKE '%$pesquisar%' 
                            OR numero LIKE '%$pesquisar%'    
                            OR bairro LIKE '%$pesquisar%'
                            OR cidade LIKE '%$pesquisar%'
                            OR nome LIKE '%$pesquisar%'
                            OR contrato LIKE '%$pesquisar%'
                            OR data_inclusao LIKE '%$pesquisar%'";
                    $cliente = mysqli_query($connect, $sql);
                    $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
                    $total = mysqli_num_rows($cliente);
                    $registros = 10;
                    $numPaginas = ceil($total/$registros);
                    $inicio = ($registros*$pagina) - $registros;
                    $total = mysqli_num_rows($cliente);
                }else{
                    
                    $pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
                    $busca = "SELECT * FROM endereco";
                    $cliente = mysqli_query($connect, $busca);
                    $total = mysqli_num_rows($cliente);
                    $registros = 10;
                    $numPaginas = ceil($total/$registros);
                    $inicio = ($registros*$pagina) - $registros;
                    $busca = "SELECT * FROM endereco LIMIT $inicio, $registros";
                    $cliente = mysqli_query($connect, $busca);
                    $total = mysqli_num_rows($cliente);
                }    
                    while ($dados = mysqli_fetch_array($cliente)){
                        $date = new datetime($dados['data_inclusao']);
            ?>
                        <tr>
                            <td class="center"><?php echo $dados['rua']?></td>
                            <td class="center"><?php echo $dados['numero']?></td>
                            <td class="center"><?php echo $dados['complemento']?></td>
                            <td class="center"><?php echo $dados['bairro']?></td>
                            <td class="center"><?php echo $dados['cidade']?></td>
                            <td class="center"><?php echo $dados['nome']?></td>
                            <td class="center"><?php echo $dados['contrato']?></td>
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
              
    <ul class="pagination">
        <li class='disabled'><a href='index.php?pagina=1'><i class="material-icons">chevron_left</i></a></li>
            <?php for($i=$pagina - $maxLinks;$i<=$pagina-1; $i++){
                $estilo = "";
                if($i>=1){
                    if($pagina == $i){
                        $estilo = "class='active'";
                    }?>
                    <li <?php echo $estilo; ?>><a href="index.php?pagina=<?php echo $i;?>"><?php echo $i;?></a></li>
        <?php }?>   
            <?php }?>
            <?php for($i=$pagina ;$i<=$pagina + $maxLinks; $i++){
                $estilo = "";
                if($i<= $numPaginas){
                    if($pagina == $i){
                        $estilo = "class='active #1a237e indigo darken-4 '";
                    }else{
                        $estilo = "class='waves-effect'";
                    }?>
                    <li <?php echo $estilo; ?>><a href="index.php?pagina=<?php echo $i;?>"><?php echo $i;?></a></li>
                <?php }?>
            <?php }?>
        <li <?php echo $estilo; ?>><a href="index.php?pagina=<?php echo $numPaginas-1;?>"><i class="material-icons">chevron_right</i></a></li>
    </ul>
    
    <br>
         <a href =http://127.0.0.1/blacklist/adicionar 
         class="btn #1a237e indigo darken-4 left" 
         style="border-radius: 30px">
            Adicionar Endereço
            <i class="material-icons right">add</i>
        </a>
    </div>
</div>


<?php
//Adicionar href="adicionar.php" apos adição do login no ultimo <a>"
//footer
include_once 'includes/footer.php';
?>
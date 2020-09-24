<?php
//header
    include_once 'php_action/db_usersblacklist_connect.php';
    include_once 'includes/header.php';
    include_once 'includes/mensagem.php'
?>
    <div class="row-center">
        <?php
            if(isset($_GET['p'])){
              $pagina =  $_GET['p'].".php";
              if(is_file("conteudo/$pagina")){
                  include("conteudo/$pagina");
              }else{
                  include("conteudo/404.php");
              }
            }else{
                include("conteudo/incial.php");
            }
        ?>
    </div>

<?php
    include_once 'includes/footer.php'
?>
<?php
//conexão bd
require_once "php_action/db_usersblacklist_connect.php";


if(isset($_POST['cadastrar-usuario'])){
    //1- registro dados
    if(!isset($_SESSION))
        session_start();
    $date = date("Y/m/d");
    foreach($_POST as $chave=>$valor) {
        $_SESSION[$chave] = $mysqli->real_escape_string($valor);
    }


    //2- validação dados
    if(strlen($_SESSION['nome'])==0) {
        $erro[] = "Preencha o nome.";
    }
    if(strlen($_SESSION['sobrenome'])==0) {
        $erro[] = "Preencha o sobrenome.";
    }
    if(strlen($_SESSION['setor'])==0) {
        $erro[] = "Selecione o setor.";
    }
    if(strlen($_SESSION['nivel_acesso'])==0) {
        $erro[] = "Selecione o nivel.";
    }
    if(substr_count($_SESSION['email'],'@')!=1
        || substr_count($_SESSION['email'],'.')<1
        || substr_count($_SESSION['email'],'.')>2) {
        $erro[] = "Preencha o email corretamente.";
    }
    if(strlen($_SESSION['senha'])<8 ||strlen($_SESSION['senha'])>16) {
        $_SESSION['mensagem']= "Erro ao cadastrar";
        $erro[] = "prencha a senha corretamente.";
    }
    if(strcmp($_SESSION['senha'],$_SESSION['rsenha'])!=0) {
        $erro[] = "Senhas são diferentes.";
    }
    //3- envio ao bd e redir
    if(count($erro)==0) {
        $senha = md5(md5($_SESSION['senha']));
        $sql = "INSERT INTO usuario (
                     nome, 
                     sobrenome,
                     setor, 
                     email, 
                     senha,
                     nivel_acesso,
                     datacadastro)
                     VALUES(
                        '$_SESSION[nome]',
                        '$_SESSION[sobrenome]',
                        '$_SESSION[setor]',
                        '$_SESSION[email]',
                        '$senha',
                        '$_SESSION[nivel_acesso]',
                        '$date'
                     )                     
                     ";
        $confirma = $mysqli->query($sql) or die ($connect->error);
        if ($confirma) {
            unset($_SESSION['nome'],
                $_SESSION['sobrenome'],
                $_SESSION['setor'],
                $_SESSION['email'],
                $_SESSION['senha'],
                $_SESSION['nivel_acesso']);
            echo "<script>location.href='controleusuario.php';</script>";
            $_SESSION['mensagem']= "Sucesso ao cadastrar";
        } else {
            $erro[]= $confirma;

        }
    }
}
?>

<div class="row">
    <div class="col s12 m6 push-m3 ">

        <h3 class="light indigo-text text-darken-4 ">Cadastrar funcionario</h3>
        <?php

        if(isset($erro)&&(count($erro)>0)){
            echo "<div class='erro'>";
            foreach ($erro as $valor){
                echo "$valor <br>";

                echo "</div>";
            }
        }
        ?>
        <form action="controleusuario.php?p=cadastrarusuario" method="POST">
                <div class="input-field col s6">
                   <input type="text"
                          value="<?php if(isset($_SESSION['nome'])){
                              echo $_SESSION['nome'];
                          }?>"
                          name="nome"
                          required="required"
                          id="nome">
                   <label for="nome">Nome</label>
                </div>

                <div class="input-field col s6">
                    <input type="text"
                           value="<?php if(isset($_SESSION['sobrenome'])){
                               echo $_SESSION['sobrenome'];
                           }?>"
                           name="sobrenome"
                           required="required"
                           id="sobrenome">
                    <label for="sobrenome">Sobrenome</label>
                </div>
                <div class="col s6">
                <label>Setor</label>
                    <select required="required" class="browser-default" name="setor" style="color: #9e9e9e;">
                        <option style="color: #dcdcdc;"
                                value="" disabled selected>Escolha o setor</option>
                        <option style="color: #696969;"
                                value="1"
                                <?php if(isset($_SESSION['setor'])&&($_SESSION['setor']== 1)){
                                    echo "selected";}?>
                        >Comercial</option>
                        <option style="color: #696969;"
                                value="2"
                                <?php if(isset($_SESSION['setor'])&&($_SESSION['setor']== 2)){
                                    echo "selected";}?>
                        >Cobrança</option>
                        <option style="color: #696969;"
                                value="3"
                                <?php if(isset($_SESSION['setor'])&&($_SESSION['setor']== 3)){
                                    echo "selected";}?>
                        >Outros</option>
                    </select>
                </div>

                <div class="col s6">
                    <label>Nível de acesso</label>
                    <select required="required"
                            class="browser-default"
                            name="nivel_acesso"
                            style="color: #9e9e9e;"
                            >
                        <option style="color: #dcdcdc;"
                                value=""
                                disabled selected>Nível de acesso</option>
                        <option class="options"
                                style="color: #696969;"
                                value="1"
                                <?php if(isset($_SESSION['nivel_acesso'])&&($_SESSION['nivel_acesso']== 1)){
                                    echo "selected";}?>
                        >Comum</option>
                        <option style="color: #696969;"
                                value="2"
                                <?php if(isset($_SESSION['nivel_acesso'])&&($_SESSION['nivel_acesso']== 2)){
                                    echo "selected";}?>
                        >Administrador</option>
                    </select>
                </div>

                <div class="input-field col s6">
                    <input type="password" name="senha" required="required" id="senha">
                    <label for="senha">Senha</label>
                    <p style="color: #696969;">Senha deve ter entre 8 e 16 caracteres</p>
                </div>
                <div class="input-field col s6">
                    <input type="password" name="rsenha" required="required" id="rsenha">
                    <label for="rsenha">Repita Senha</label>
                </div>

                <div class="input-field col s12">
                    <input type="email" value="<?php if(isset($_SESSION['email'])){
                        echo $_SESSION['email'];
                    }?>"
                           name="email"
                           required="required" id="email">
                    <label for="email">E-mail</label>
                </div>
                <div class="col 12">
                    <button type="submit" name="cadastrar-usuario"
                            class="center-align btn #1a237e indigo darken-4 push-m3"
                            style="border-radius: 30px">
                        Cadastrar
                        <i class="material-icons right">send</i>
                    </button>
                    <a href="controleusuario.php"
                                class="left-align btn #1a237e indigo darken-4 push-m1"
                                style="border-radius: 30px">
                        funcionarios
                        <i class="material-icons right">keyboard_return</i>
                    </a>
                </div>
        </form>
    </div>
</div>
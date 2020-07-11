<?php
//header
include_once 'includes/header.php';
?>
<?php
 $data = date("d/m/Y");
?>
    <div class ="row">
        <div class="col s12 m6 push-m3">
            <h3 class="light indigo-text text-darken-4 ">Adicionar inadimplente</h3>
            <form action="php_action/create.php" method="post">

                <div class = "input-field col s12">
                    <input  type="text" name="cpf" id="cpf" class="validate" >
                    <label for="cpf">CPF</label>
                </div>

                <div class = "input-field col s6">
                    <input type="text" name="nome" id="nome" class="validate">
                    <label for="nome">Nome</label>
                </div>

                <div class = "input-field col s6">
                    <input type="text" name="sobrenome" id="sobrenome" class="validate">
                    <label for="sobrenome">Sobrenome</label>
                </div>

                <div class = "input-field col s6">
                    <input type="text" name="cep" id="cep" class="validate">
                    <label for="cep">CEP</label>
                </div>

                <div class = "input-field col s6">
                    <input type="text" name="rua" id="rua" class="validate">
                    <label for="rua">Rua</label>
                </div >

                <div class = "input-field col s6">
                    <input type="number" name="numero" id="numero" class="validate">
                    <label for="numero">N°</label>
                </div>

                <div class = "input-field col s6">
                    <input type="text" name="complemento" id="complemento" class="validate">
                    <label for="complemento">Complemento</label>
                </div>

                <div class = "input-field col s6">
                    <input type="text" name="bairro" id="bairro" class="validate">
                    <label for="bairro">Bairro</label>
                </div>

                <div class = "input-field col s6">
                    <input type="text" name="cidade" id="cidade" class="validate">
                    <label for="cidade">Cidade</label>
                </div>

                <div class = "input-field col s12">
                    <input type="date" name="data" id="data" class="validate">
                    <label for="data">Data Atual</label>
                </div>

                <button tipe="submit" name="bnt-cadastrar"
                        class="center-align btn #1a237e indigo darken-4"
                        style="border-radius: 30px">
                    Cadastrar
                    <i class="material-icons right">send</i>
                </button>

                <a href="index.php"
                        class="center-align btn #1a237e indigo darken-4"
                        style="border-radius: 30px">
                    Lista de endereços
                    <i class="material-icons right">keyboard_return</i>
                </a>

            </form>
        </div>
    </div>


<?php
//footer
include_once 'includes/footer.php';
?>
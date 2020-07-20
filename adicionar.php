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
                    <input  type="text"
                            maxlength="14"
                            name="cpf"
                            id="cpf"
                            class="validate"
                            placeholder="Ex.:111111111"
                            pattern="[0-9]{11,14}"
                            title="Somente numero e entre 11 para cpf e 14 numeros para cnpj"
                            required="required" >
                    <label for="cpf">CPF</label>
                </div>

                <div class = "input-field col s6">
                    <input type="text"
                           name="nome"
                           id="nome"
                           class="validate"
                           required="required"
                           placeholder="Ex.: joao">
                    <label for="nome">Nome</label>
                </div>

                <div class = "input-field col s6">
                    <input type="text"
                           name="sobrenome"
                           id="sobrenome"
                           class="validate"
                           required="required"
                           placeholder="Ex.: silva">
                    <label for="sobrenome">Sobrenome</label>
                </div>

                <div class = "input-field col s6">
                    <input type="text"
                           name="cep"
                           id="cep"
                           class="validate"
                           pattern="[0-9]{8}"
                           title="cep invalido"
                           required="required"
                           placeholder="Ex.: 11111111"
                           minlength="8"
                           maxlength="8"
                    >
                    <label for="cep">CEP</label>
                </div>

                <div class = "input-field col s6">
                    <input type="text"
                           name="rua"
                           id="rua"
                           class="validate"
                           required="required"
                           placeholder="Ex.: são luis">
                    <label for="rua">Rua</label>
                </div >

                <div class = "input-field col s6">
                    <input type="number"
                           name="numero"
                           id="numero"
                           class="validate"
                           required="required"
                           placeholder="ex.: 948">
                    <label for="numero">N°</label>
                </div>

                <div class = "input-field col s6">
                    <input type="text"
                           name="complemento"
                           id="complemento"
                           class="validate"
                           placeholder="Ex.: ap202">
                    <label for="complemento">Complemento</label>
                </div>

                <div class = "input-field col s6">
                    <input type="text"
                           name="bairro"
                           id="bairro"
                           class="validate"
                           required="required"
                           placeholder="Celeste">
                    <label for="bairro">Bairro</label>
                </div>

                <div class = "input-field col s6">
                    <input type="text"
                           name="cidade"
                           id="cidade"
                           class="validate"
                           required="required"
                           placeholder="Campo Bom">
                    <label for="cidade">Cidade</label>
                </div>

                <div class = "input-field col s12">
                    <input type="date"
                           name="data"
                           id="data"
                           required="required"
                           class="validate">
                    <label for="data">Data Atual</label>
                </div>

                <button type="submit" name="bnt-cadastrar"
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
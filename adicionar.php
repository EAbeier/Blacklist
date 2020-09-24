<?php
//header
include_once 'includes/header.php';
?>

<?php
include_once 'includes/mensagem.php';
?>
    <div class ="row">
        <div class="col s12 m6 push-m3">
            <h3 class="light indigo-text text-darken-4 ">Adicionar inadimplente</h3>
            <form action="php_action/create.php" method="post">

                <div class = "input-field col s12">
                    <input  type="text"
                            maxlength="14"
                            name="contrato"
                            id="contrato"
                            class="validate"
                            required="required"
                    >
                    <label for="contrato">Contrato</label>
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
                <div class="col s12">
                <button type="submit" name="bnt-cadastrar"
                        class="center-align btn #1a237e indigo darken-4"
                        style="border-radius: 30px">
                    Cadastrar
                    <i class="material-icons right">send</i>
                </button>

                <a href=""
                        class="left-align btn #1a237e indigo darken-4"
                        style="border-radius: 30px">
                    Lista de endereços
                    <i class="material-icons right">keyboard_return</i>
                </a>
                </div>
            </form>
        </div>
    </div>


<?php
//Adicionar  apos adição do login no ultimo <a>"
//
//footer
include_once 'includes/footer.php';
?>
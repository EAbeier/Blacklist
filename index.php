<?php
//header
include_once 'includes/header.php';
?>

<div class ="row">
    <div class="col s12 m3 push-m3">
        <h3 class="light indigo-text text-darken-4 ">Blacklist CleanNet</h3>
        <table class="striped s12 m6 push-m3">
            <thead>
                <th>Rua</th>
                <th> N°</th>
                <th> Complemento</th>
                <th>Bairro</th>
                <th>cidade</th>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>CPF</th>
                <th>Data inclusão</th>
                <th>Data Limite</th>
            </thead>
            <tbody>
                <tr>
                    <td>rua teste</td>
                    <td>123</td>
                    <td>complmeneto teste</td>
                    <td>Bairro teste</td>
                    <td>Cidade teste</td>
                    <td>nomeTeste</td>
                    <td>sobrenomeTeste</td>
                    <td>cpfTeste</td>
                    <td>data teste</td>
                    <td>data limiteTeste</td>
                    <td> </td>
                    <td><a href="" class="btn-floating #1a237e indigo darken-4"><i class="material-icons">edit</i></a></td>
                </tr>
            </tbody>
        </table>
        <br>
        <a href="adicionar.php" class="btn #1a237e indigo darken-4" style="border-radius: 30px">
            Adicionar Endereço
            <i class="material-icons right">add</i>
        </a>
    </div>
</div>


<?php
//footer
include_once 'includes/footer.php';
?>